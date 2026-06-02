import os
import sys
import time
import urllib.error
import urllib.request

from selenium import webdriver
from selenium.common.exceptions import TimeoutException
from selenium.webdriver.chrome.options import Options
from selenium.webdriver.common.by import By
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.support.ui import WebDriverWait

from config import LOGIN_URL


def check_site_ready(timeout=15, retries=3):
    """Fail fast if Laravel is not running."""
    last_error = None
    for attempt in range(1, retries + 1):
        try:
            req = urllib.request.Request(LOGIN_URL, method="GET")
            opener = urllib.request.build_opener(urllib.request.ProxyHandler({}))
            with opener.open(req, timeout=timeout) as resp:
                if resp.status < 500:
                    return
                last_error = f"HTTP {resp.status}"
        except Exception as exc:
            last_error = exc
        if attempt < retries:
            time.sleep(2)

    print("ERREUR: le site ne repond pas.")
    print(f"  URL testee: {LOGIN_URL}")
    print("  -> Double-cliquez d'abord: demarrer_site.bat")
    print(f"  Detail: {last_error}")
    sys.exit(1)


def create_chrome():
    options = Options()
    # Do not wait for full page load (avoids renderer timeout on slow PCs)
    options.page_load_strategy = "none"
    options.add_argument("--disable-gpu")
    options.add_argument("--no-sandbox")
    options.add_argument("--disable-dev-shm-usage")
    options.add_argument("--disable-extensions")
    options.add_argument("--remote-allow-origins=*")
    if os.environ.get("INST_HEADLESS", "1") != "0":
        options.add_argument("--headless=new")

    print("Demarrage de Chrome (patientez ~1 minute la 1ere fois)...")
    driver = webdriver.Chrome(options=options)
    driver.set_page_load_timeout(90)
    return driver


def open_login_page(driver):
    try:
        driver.get(LOGIN_URL)
    except TimeoutException:
        # With heavy pages, navigation may time out even if the form is ready
        pass
    WebDriverWait(driver, 30).until(EC.presence_of_element_located((By.NAME, "email")))


def submit_login(driver, email, password):
    wait = WebDriverWait(driver, 20)
    email_field = wait.until(EC.presence_of_element_located((By.NAME, "email")))
    email_field.clear()
    email_field.send_keys(email)
    password_field = driver.find_element(By.NAME, "password")
    password_field.clear()
    password_field.send_keys(password)
    driver.find_element(By.CSS_SELECTOR, "form[method='POST']").submit()


def wait_after_login(driver, *url_parts):
    def logged_in(drv):
        url = drv.current_url
        return any(part in url for part in url_parts)

    try:
        WebDriverWait(driver, 30).until(logged_in)
    except TimeoutException:
        print("ECHEC: connexion impossible.")
        print("  URL actuelle:", driver.current_url)
        if "/login" in driver.current_url:
            print("  -> Lancez: php fix_passwords.php  (dans le dossier institut)")
        raise

"""
Test Selenium - Institut (connexion admin)
"""
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.chrome.service import Service
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC

BASE_URL = "http://127.0.0.1:8000"
EMAIL = "admin@institut.com"
PASSWORD = "password"

def main():
    options = webdriver.ChromeOptions()
    service = Service("chromedriver-win64/chromedriver.exe")
    driver = webdriver.Chrome(service=service, options=options)
    try:
        driver.get(f"{BASE_URL}/login")
        wait = WebDriverWait(driver, 15)
        email_field = wait.until(EC.presence_of_element_located((By.NAME, "email")))
        email_field.send_keys(EMAIL)
        driver.find_element(By.NAME, "password").send_keys(PASSWORD)
        btn = driver.find_element(By.CSS_SELECTOR, "button[type='submit']")
        driver.execute_script("arguments[0].click();", btn)
        wait.until(EC.url_contains("/dashboard"))
        print("OK: Connexion reussie!")
        print("URL:", driver.current_url)
    except Exception as e:
        print("ECHEC:", e)
        raise
    finally:
        driver.quit()


if __name__ == "__main__":
    main()
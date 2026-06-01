from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.chrome.service import Service
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC

BASE_URL = "http://127.0.0.1:8000"
EMAIL = "john.smith@institut.com"
PASSWORD = "password"

def main():
    service = Service("chromedriver-win64/chromedriver.exe")
    driver = webdriver.Chrome(service=service)
    try:
        driver.get(f"{BASE_URL}/login")
        wait = WebDriverWait(driver, 15)
        wait.until(EC.presence_of_element_located((By.NAME, "email"))).send_keys(EMAIL)
        driver.find_element(By.NAME, "password").send_keys(PASSWORD)
        btn = driver.find_element(By.CSS_SELECTOR, "button[type='submit']")
        driver.execute_script("arguments[0].click();", btn)
        wait.until(EC.url_contains("/teacher/dashboard"))
        print("✅ Test Teacher Login - REUSSI!")
        print("URL:", driver.current_url)
    except Exception as e:
        print("❌ ECHEC:", e)
    finally:
        driver.quit()

if __name__ == "__main__":
    main()
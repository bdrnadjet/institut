from selenium import webdriver
from webdriver_manager.chrome import ChromeDriverManager
from selenium.webdriver.chrome.service import Service

print("جاري تحميل chromedriver...")
service = Service(ChromeDriverManager().install())
driver = webdriver.Chrome(service=service)

print("جاري فتح Google...")
driver.get("https://www.google.com")

import time
time.sleep(5)

driver.quit()
print("تم بنجاح!")
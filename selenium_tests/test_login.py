"""
Test Selenium - Institut (connexion admin)
"""
from driver_helper import check_site_ready, create_chrome, open_login_page, submit_login, wait_after_login

EMAIL = "admin@institut.com"
PASSWORD = "password"


def main():
    check_site_ready()
    driver = create_chrome()
    try:
        open_login_page(driver)
        submit_login(driver, EMAIL, PASSWORD)
        wait_after_login(driver, "/admin/dashboard", "/home")
        print("OK: Connexion admin reussie!")
        print("URL:", driver.current_url)
    except Exception as e:
        print("ECHEC:", e)
        raise
    finally:
        driver.quit()


if __name__ == "__main__":
    main()

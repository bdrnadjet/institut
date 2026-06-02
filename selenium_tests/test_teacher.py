from driver_helper import check_site_ready, create_chrome, open_login_page, submit_login, wait_after_login

EMAIL = "john.smith@institut.com"
PASSWORD = "password"


def main():
    check_site_ready()
    driver = create_chrome()
    try:
        open_login_page(driver)
        submit_login(driver, EMAIL, PASSWORD)
        wait_after_login(driver, "/teacher/dashboard")
        print("OK: Test Teacher Login - REUSSI!")
        print("URL:", driver.current_url)
    except Exception as e:
        print("ECHEC:", e)
    finally:
        driver.quit()


if __name__ == "__main__":
    main()

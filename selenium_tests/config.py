import os

BASE_URL = os.environ.get("INSTITUT_BASE_URL", "http://127.0.0.1:8000").rstrip("/")
LOGIN_URL = f"{BASE_URL}/login"

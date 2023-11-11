import requests
import random

# Spam raporu gönderen işlevi güncelleyin.
def tiktok_spam_report(url, use_proxies, proxy_file_path):
    session = requests.Session()

    if use_proxies:
        try:
            with open(proxy_file_path, "r") as f:
                proxies = [line.strip() for line in f]

            if len(proxies) < 100:
                print("Yeterli proxy yok. Proxies kullanılmadan işlem yapılıyor.")
                use_proxies = False
        except FileNotFoundError:
            print(f"{proxy_file_path} dosyası bulunamadı. Proxies kullanılmadan işlem yapılıyor.")
            use_proxies = False

    headers = {
        "User-Agent": "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36"
    }

    spam_count = 0
    for _ in range(10000):
        if use_proxies:
            proxy = random.choice(proxies)
            session.proxies = {"http": proxy, "https": proxy}

        response = session.get(url, headers=headers)

        if response is not None and response.status_code == 200:
            spam_count += 1
            print("Spam raporu gönderildi.")
        else:
            print("Spam raporu gönderilemedi.")

    return spam_count

# Kullanıcıdan bilgileri alın.
target_url = input("Hedef URL'yi girin: ")
use_proxies_input = input("Proxy kullanmak ister misiniz? (E/e veya H/h): ").lower()
use_proxies = use_proxies_input == 'e'

if use_proxies:
    proxy_file_path = input("Proxies dosyasının yolunu girin: ")
else:
    proxy_file_path = ""

# Spam raporlarını gönderin ve sonucu yazdırın.
spam_count = tiktok_spam_report(target_url, use_proxies, proxy_file_path)
print(f"{spam_count} spam raporu gönderildi.")

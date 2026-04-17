# battu

> Dự án Laravel | Repo: [phantuanviet0706/battu](https://github.com/phantuanviet0706/battu)

---

## Yêu cầu hệ thống

- [PHP](https://www.php.net/downloads) >= 8.0
- [Composer](https://getcomposer.org/download/)
- [Git](https://git-scm.com/downloads)
- (Tuỳ chọn) Database MySQL/MariaDB hoặc SQLite

## Bắt đầu cài đặt

### 1. Clone source code

```bash
git clone https://github.com/phantuanviet0706/battu.git
cd battu
```

### 2. Cài đặt thư viện

```bash
composer install
```

### 3. Tạo file môi trường cấu hình

```bash
cp .env.example .env
```

> Truy cập & chỉnh sửa thông số database, mail,... trong file `.env` cho phù hợp với môi trường local của bạn.

### 4. Sinh key cho ứng dụng

```bash
php artisan key:generate
```

### 5. Chạy migration & seed (nếu có)

```bash
php artisan migrate
# Nếu muốn thêm dữ liệu mẫu:
# php artisan db:seed
```

### 6. Khởi động server local

```bash
php artisan serve
```

Truy cập: [http://localhost:8000](http://localhost:8000)

---

## Tài liệu tham khảo

- [Laravel Official Documentation](https://laravel.com/docs)
- [Composer](https://getcomposer.org/doc/)

---

## License

This project is open-source and available under the [MIT license](LICENSE).

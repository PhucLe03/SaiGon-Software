# Đồ án tổng hợp Công nghệ phần mềm - BK-Ecommerce

## Manual - Hướng dẫn sử dụng

- Yêu cầu:
    - Cài đặt [PHP](https://www.php.net/manual/en/install.php), [MySQL](https://dev.mysql.com/downloads/installer/) (khuyến khích cài đặt bằng [XAMPP](https://www.apachefriends.org/download.html)).
    - Clone hoặc download file từ repository này.
    ```c
    git clone https://github.com/PhucLe03/SaiGon-Software
    ```
- Set up database cho ứng dụng
    - Khởi động MySQL.
    - Tạo database tên `bkecommerce` trong MySQL.
    - Copy nội dung trong file [bkecommerce.sql](bkecommerce.sql) dán vào querybox trong database `bkecommerce` đã tạo trước đó.
    - Mở terminal và navigate vào folder tên `SaiGon-Software`.
    ```c
    cd SaiGon-Software
    ```
    - Khởi động ứng dụng với port tùy ý (ở đây dùng port 3000).
    ```c
    php -S localhost:3000
    ```

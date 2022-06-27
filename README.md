## Litbang Web Application

Web application for borrowing and lending goods. Developing using [Laravel 9](https://laravel.com/) Framework

### Installation

-   Clone repository to local computer
-   Update package composer
    ```
    composer update
    ```
-   Copy .env.example file to .env
    ```
    cp .env.example .env
    ```
-   Generate key to .env file
    ```
    php artisan key:generate
    ```
-   Set the database on the .env file according to the database on the local computer
-   Migrate database
    ```
    php artisan migrate:fresh --seed
    ```
-   Run server
    ```
    php artisan serve
    ```

### Team

-   [Muhammad Fikri Sandi Pratama](https://github.com/fikrisandi/) - Frontend Engineer
-   [Aufi Fillah](https://github.com/fillahaufi/) - Frontend Engineer
-   [Ahmad Lamaul Farid](https://github.com/faridlamaul/) - Backend Engineer

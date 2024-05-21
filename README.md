# Movie

A website to watch movies and series.

## Installation

1. **Clone the repository**

    ```bash
    git clone git@github.com:abrahamalanya/movie.git
    cd movie
    ```

2. **Install PHP dependencies**

    ```bash
    composer install
    ```

3.  **Set up the environment file**

    Copy the `.env.example` file and rename it to `.env`. Then, update the environment variables as needed.

    ```bash
    cp .env.example .env
    ```

5. **Generate the application key**

    ```bash
    php artisan key:generate
    ```

6. **Set up the database**

    Make sure you have a database created and update the environment variables in the `.env` file with your database credentials.

    Then, run the migrations:

    ```bash
    php artisan migrate
    ```

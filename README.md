# miAccounts-coding-test

## Demo


### Account heads in hierarchical view

![Alt Text](https://github.com/SubheSadek/repo_images/blob/main/miAccounts/hierarchical.png)


### Account heads in Table view

![Alt Text](https://github.com/SubheSadek/repo_images/blob/main/miAccounts/table_view.png)


## Tools & Tech stack used
- Laravel (back-end api)
- VueJS (front-end)
- Vite (compiler)
- Iviewui (UI)
- MySQL (Database)
- Pint (Code quality)

<h3> Prerequisites </h3>

Before we get started, make sure that you have the following prerequisites installed on your local machine:

<ul>
<li>PHP (minimum version: 8.2)</li>
<li>Composer (version 2)</li>
<li>Docker (minimum version: 20.10)</li>
<li>Git</li>
<li>Node (16)</li>
</ul>

## Installation and Setup Both Docker and manual



### Sail (Docker) Installation

To install this project, follow these steps:

1. Clone the repository to your local machine:

```python
git clone https://github.com/SubheSadek/miAccounts-coding-test.git
```

2. Navigate to the project directory:

```python
cd miAccounts-coding-test
```

3. Set up the environment variables by creating a copy of the `.env.example` file and renaming it to `.env`:

```python
cp .env.example .env
```

4: Install Laravel Sail:

```python
composer require laravel/sail --dev
```

This command will download and install Laravel Sail and its dependencies in your project's vendor directory.

Or,

```python
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs

```

<b> Note: </b> If you encounter any issues or have any questions, feel free to check out the official [Laravel Documentation](https://laravel.com/docs/9.x/sail#installing-composer-dependencies-for-existing-projects).

5: Set up Laravel Sail

```python
php artisan sail:install
```

6: Start Laravel Sail

```python
./vendor/bin/sail up
```

7: Run the database migrations:

```python
sail artisan migrate
```

8. Run the database migrations:

```python
sail artisan db:seed
```

9: Generate the application key:

```python
sail artisan key:generate
```

10: Install & setup NPM

```python
sail npm install && sail npm run dev
```

### Manual Installation

To install this project, follow these steps:

1. Clone the repository to your local machine:

```python
git clone https://github.com/subhesadek/miAccounts-coding-test.git
```

2. Navigate to the project directory:

```python
cd miAccounts-coding-test
```

3. Install the project dependencies:

```python
composer install && npm install
```

4. Set up the environment variables by creating a copy of the `.env.example` file and renaming it to `.env`:

```python
cp .env.example .env
```

5. Generate the application key:

```python
php artisan key:generate
```

6. Run the database migrations:

```python
php artisan migrate
```
```

7. Run the database migrations:

```python
php artisan db:seed
```

8. Compile the frontend assets:

```python
npm run dev
```

9. Start the Laravel development server:

```python
php artisan serve
```

You should now be able to access the application at [http://localhost:8000](http://localhost:8000).


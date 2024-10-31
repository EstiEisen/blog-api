# blog-api laravel

# --Features--
CRUD for Posts: Users can create, read, update, and delete blog posts.

Post Fields:
Title: A title for the post.

Content: The main body of the blog post.

Publication Date: The date the post is published.

Authentication: Only logged-in users have the ability to create, update, and delete posts.

External API Integration: Retrieves posts from an external API and displays them within the blog.


# --Installation--

git clone https://github.com/EstiEisen/blog-api.git

cd blog-api

composer install

cp .env.example .env

php artisan key:generate

Add the database config in the .env file (DB_DATABASE=blogs_db DB_USERNAME=root password="")

php artisan migrate


# --Usage--

php artisan serve  

Open your browser and navigate to http://localhost:8000.


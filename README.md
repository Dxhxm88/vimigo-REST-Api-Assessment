## Vimigo Rest API Assessment

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

## Installation

-   Clone the repository with **git clone** or download zip file
-   Copy **.env.example** file to **.env** and edit database credentials there
-   Run **composer install**
-   Run **php artisan key:generate**
-   Run **php artisan migrate --seed**
-   Run **php artisan serve**
-   That's it: launch the main URL

## Postman Collection

[Postman JSON link](https://www.postman.com/collections/f433bf9bce68f44e2b84)

## Endpoint

| Method   | Resources          | Parameter                                               | Description                                                  | Auth |
| -------- | ------------------ | ------------------------------------------------------- | ------------------------------------------------------------ | ---- |
| `GET`    | `oauth/authorize`  | client_id, redirect_uri, response_type, scope, state    | Register Clients                                             | No   |
| `POST`   | `oauth/token`      | grant_type,client_id, client_secret, redirect_uri, code | Get access token                                             | No   |
| `POST`   | `api/users`        | name, email, password                                   | Register a new user                                          | Yes  |
| `GET`    | `api/users`        |                                                         | Get all users (name, email)                                  | Yes  |
| `PUT`    | `api/users/{user}` | name, email, password                                   | Update a user                                                | Yes  |
| `DELETE` | `api/users/{user}` |                                                         | Delete a user by id                                          | Yes  |
| `GET`    | `api/users/{user}` |                                                         | Get a user by id                                             | Yes  |
| `POST`   | `api/users/import` | file                                                    | Import excel/csv to do bulk Create, Update, and Delete users | Yes  |

## Vimigo Rest API Assessment

**Requirements**

-   [x] You are required to do CRUD functions using User Model (`[POST]/login` & `[POST]/register` is not considered as part of CRUD)

-   [x] The CRUD functions need to be **REST API**

-   [x] Your API can only be accessed if the user is authenticated through **Laravel Passport**

-   [x] All of your inputs need to be validated. You need to use **Laravel Form Request Validation**

-   [x] Your `[GET]/api/users` able to filter by name and email, and the response must have pagination.

-   [x] when retrieving the data, only need to show name and email using **Laravel API Resource**.

-   [x] You also need to have an API to import excel/csv files to do bulk Create, Update and Delete users.

-   [x] The project progress can be tracked using any version-control system (e.g: Upload in GitHub)

-   [x] you MUST save all of the requests and responses as a Postman collection, and include the Postman JSON link in your `README.md`

## Installation

-   Clone the repository with **git clone** or download zip file
-   Copy **.env.example** file to **.env** and edit database credentials there
-   Run **composer install**
-   Run **php artisan key:generate**
-   Run **php artisan migrate --seed**
-   Run **php artisan passport:client --personal**
-   Run **php artisan serve**
-   That's it: launch the main URL

## Postman Collection

[Postman JSON link](https://www.postman.com/collections/f433bf9bce68f44e2b84)

## Endpoint

| Method   | Resources          | Parameter                                    | Description                                                  | Auth |
| -------- | ------------------ | -------------------------------------------- | ------------------------------------------------------------ | ---- |
| `POST`   | `api/register`     | name, email, password, password_confirmation | Register a user to login                                     | No   |
| `POST`   | `api/login`        | email, password                              | Login to get personal access token                           | No   |
| `POST`   | `api/logout`       | `null`                                       | Logout a user and revoke personal access token               | Yes  |
| `GET`    | `api/users`        | `null`                                       | Get all users (name, email)                                  | Yes  |
| `PUT`    | `api/users/{user}` | name, email, password                        | Update a user                                                | Yes  |
| `DELETE` | `api/users/{user}` | `null`                                       | Delete a user by id                                          | Yes  |
| `GET`    | `api/users/{user}` | `null`                                       | Get a user by id                                             | Yes  |
| `POST`   | `api/users/import` | file                                         | Import excel/csv to do bulk Create, Update, and Delete users | Yes  |

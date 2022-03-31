## Vimigo Rest API Assessment

**Requirements**

[x] You are required to do CRUD functions using User Model (`[POST]/login` & `[POST]/register` is not considered as part of CRUD)

[] The CRUD functions need to be **REST API**

[] Your API can only be accessed if the user is authenticated through **Laravel Passport**

[] All of your inputs need to be validated. You need to use **Laravel Form Request Validation**

[] Your `[GET]/api/users` able to filter by name and email, and the response must have pagination.

[x] when retrieving the data, only need to show name and email using **Laravel API Resource**.

[] You also need to have an API to import excel/csv files to do bulk Create, Update and Delete users.

[] The project progress can be tracked using any version-control system (e.g: Upload in GitHub)

[]You MUST save all of the requests and responses as a Postman collection, and include the Postman JSON link in your `README.md`

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

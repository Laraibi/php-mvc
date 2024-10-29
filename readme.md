# PHP MVC Project

This project is a simple PHP application following the MVC (Model-View-Controller) design pattern. It includes a basic CRUD (Create, Read, Update, Delete) functionality for managing "Person" records, demonstrating a structured approach to building PHP applications.

## Project Structure

- **index.php**: Main entry point, initializes the application and directs requests to the appropriate route.
- **app/**: Core application files, including database, environment, routing, and view rendering.
  - **Database.php**: Establishes the database connection using PDO.
  - **Env.php**: Loads environment variables from the `.env` file for secure configuration.
  - **Router.php**: Defines routes and directs requests to controllers based on HTTP methods and paths.
  - **View.php**: Renders views and injects data into templates.
- **app/controllers**: Contains controller classes for handling business logic.
  - **PersonneController.php**: Controller for managing "Person" entities, including create, read, update, and delete actions.
- **app/models**: Contains model classes that interact with the database.
  - **Model.php**: Base model with generic CRUD methods.
  - **person.php**: Model for the "Person" entity.
- **Views**: Contains view files for displaying HTML content.
  - **layout.php**: Main layout file.
  - **pages/personnes**: Contains views for listing and creating person entries.

## Setup

### Prerequisites

- PHP 7.4 or higher
- MySQL or another compatible database

### Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/laraibi/php-mvc.git
   ```

2. Navigate to the project directory:

   ```bash
   cd php-mvc
   ```

3. Copy `.env.example` to `.env` and update the database credentials.

   ```bash
   cp .env.example .env
   ```

4. Configure your database settings in the `.env` file.


## Usage

- **Add a Person**: Navigate to the "Add Person" form and fill out the fields to add a new entry.
- **View All Persons**: See a list of all persons, with options to edit or delete each entry.
- **Edit a Person**: Update details for an existing person by selecting "Edit".
- **Delete a Person**: Remove a person from the database by selecting "Delete".

## Features

- **MVC Architecture**: Organized code structure following the Model-View-Controller pattern.
- **CRUD Functionality**: Create, read, update, and delete operations for managing person entries.
- **Routing**: Dynamic routing based on HTTP methods.
- **Environment Configuration**: Securely stores credentials and environment-specific settings in `.env`.

## Project Dependencies

- **PDO**: PHP Data Objects for database interaction.
- **Bootstrap** (CDN): Used for styling and layout.

## Contributing

Feel free to submit issues or pull requests if you'd like to contribute to this project.


## Contact

For questions, please reach out to the project maintainer at [meh.laraibi@gmail.com](mailto:meh.laraibi@gmail.com).
```


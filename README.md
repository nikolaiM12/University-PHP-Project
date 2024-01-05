# Library_Management_System

## Overview
This project is a comprehensive Library Management System built using the PHP Laravel Framework. It encompasses a range of functionalities and controllers to manage various aspects of a library's operations efficiently.

### Author - Overview
1. Controller:
The `AuthorController` manages author-related operations within the Library Management System:
- **`index()`**: Retrieves all authors and renders a view displaying a paginated list of authors.
- **`create()`**: Renders a form to add a new author.
- **`store(Request $request)`**: Handles the creation of a new author based on the submitted form data.
- **`show($id)`**: Displays detailed information about a specific author.
- **`edit($id)`**: Renders a form to modify the details of an existing author.
- **`update(Request $request, $id)`**: Handles the update operation for an existing author based on the submitted form data.
- **`delete($id)`**: Shows a confirmation page to delete a specific author.
- **`destroy($id)`**: Deletes the specified author and redirects to the author index page.

This controller interacts with the `IAuthorService` interface, abstracting the business logic related to authors. It leverages views associated with each action to present information to users and collect necessary data for author management.

The controller provides a clear separation of concerns by delegating author-related operations to the `IAuthorService`, ensuring a modular and maintainable structure within the system.

2. Model:
- **Table Structure:** The authors table in the database has columns for `id` (automatically generated), `name` (author's name), and `biography` (author's biography).

- **Relationship:** The model defines a relationship with the `Book` model using the `hasMany` method represents a `one-to-many` relationship. This implies that an author can have multiple books associated with them.

3. Interface: The `IAuthorService` interface outlines the contract for handling author-related functionalities within the Library Management System. It defines the methods that any implementation of this service must provide. 
- Here's an overview:
    - **`GetAllAuthors()`**: Retrieves all authors from the database.
    - **`CreateAuthor(array $data)`**: Creates a new author based on the provided data.
    - **`GetAuthorById($id)`**: Retrieves a specific author by their ID.
    - **`UpdateAuthor($id, array $data)`**: Updates the details of an existing author based on the provided data and ID.
    - **`DeleteAuthor($id)`**: Deletes a specific author by their ID.

4. Service: The `AuthorService` class, implements this `IAuthorService` interface. This class encapsulates the business logic related to authors, handling the interactions with the database, data validation, and managing the CRUD (Create, Read, Update, Delete) operations for authors within the system.

5. Views: 
    - **`index.blade`**: The view for the `AuthorController` presents a tabulated list of authors, showcasing their names, biographies, and corresponding actions available for each author entry.
    - **`show.blade`**: The view for the `AuthorController` displays detailed information about a specific author. It exhibits the author's name and biography in read-only fields. Additionally, it offers options to either update the author's details or return to the list of all authors.
    - **`create.blade`**: The view for the `AuthorController` facilitates the addition of a new author. It contains form fields for entering the author's name and biography. Upon form submission, it allows users to add a new author to the system. The view also includes error handling for validation messages and provides an option to return to the list of all authors.
    - **`delete.blade`**: The view for the `AuthorController` handles the deletion of a specific author. It displays the author's name and biography in read-only fields along with a confirmation button for deleting the author. Upon clicking the "Confirm" button, it triggers a prompt to confirm the deletion action. Additionally, it offers an option to return to the list of all authors. 
    - **`edit.blade`**: The view for the `AuthorController` facilitates the modification of an existing author's details. It presents input fields pre-filled with the current author's name and biography, allowing users to update this information. Error messages are displayed if the input fields are incomplete or incorrect. Upon submission, users can either update the author's information or return to the list of all authors.

6. Routes: The routes defined for the `AuthorController` include:
    - **GET|HEAD `author`**: Displays a list of authors. (`author.index -> AuthorController@index`)
    - **POST `author`**: Stores a new author in the database based on the submitted form data. (`author.store -> AuthorController@store`)
    - **GET|HEAD `author/create`**: Renders a form to create a new author. (`author.create -> AuthorController@create`)
    - **GET|HEAD `author/{author}`**: Shows details of a specific author. (`author.show -> AuthorController@show`)
    - **GET|HEAD `author/{author}/edit`**: Renders a form to edit the details of a specific author. (`author.edit -> AuthorController@edit`)
    - **PUT|PATCH `author/{author}`**: Updates the details of a specific author based on the submitted form data. (`author.update -> AuthorController@update`)
    - **GET|HEAD `author/{author}/delete`**: Displays a confirmation page to delete a specific author. (`author.delete -> AuthorController@delete`)
    - **DELETE `author/{author}`**: Deletes a specific author from the database. (`author.destroy -> AuthorController@destroy`)

### Book - Overview
1. Controller: 
The `BookController` manages book-related operations within the Library Management System:
- **`index()`**: Fetches all books and presents a paginated view of the book list.
- **`create()`**: Prepares the form for adding a new book by fetching authors, categories, and existing books for reference.
- **`store(Request $request)`**: Processes the creation of a new book based on the provided form data.
- **`show($id)`**: Displays detailed information about a specific book.
- **`details()`**: Presents an overview of all books available in the system.
- **`edit($id)`**: Retrieves specific book details for editing, along with authors and categories for reference.
- **`update(Request $request, $id)`**: Handles the update of an existing book using the provided form data.
- **`delete($id)`**: Presents a confirmation view for deleting a specific book.
- **`destroy($id)`**: Executes the deletion of a book based on the given ID.
- **`search(Request $request)`**: Facilitates book search functionality based on a provided query.

2. Model:
- **Attributes**: The model includes fields such as `title`, `description`, `ISBN`, `total_copies`, `available_copies`, `author_id`, `category_id`, and `image`, allowing storage and retrieval of essential book information.
- **Relationships**: It defines relationships with other models:
    - `author()`: Establishes a `one-to-many (belongs to)` association with the `Author` model, indicating that each book belongs to a specific author.
    - `category()`: Specifies a `one-to-many (belongs to)` connection with the `Category` model, indicating the category to which a book belongs.
    - `reviews()`: Sets up a `many-to-many (has many)` relationship with the `Review` model, allowing retrieval of all reviews associated with a book.

3. Interface: The `IBookService` interface outlines the contract for handling book-related functionalities within the Library Management System. It defines the methods that any implementation of this service must provide. 
- Here's an overview:
    - **`GetAllBooks()`**: Retrieves all books from the database.
    - **`CreateBook(array $data)`**: Creates a new book based on the provided data.
    - **`GetBookById($id)`**: Retrieves a specific book by their ID.
    - **`UpdateBook($id, array $data)`**: Updates the details of an existing book based on the provided data and ID.
    - **`DeleteBooks($id)`**: Deletes a specific book by their ID.
    - **`SearchBook($query)`**: Enables searching for books based on a provided query. This method searches the collection of books using the given query and returns matching results.

4. Service: The `BookService` class implements the `IBookService` interface. It handles the actual implementation of these methods, managing book-related functionalities within the system. This service class interacts with the database, performs data validation, executes CRUD operations (Create, Read, Update, Delete), and facilitates book searching operations based on the defined interface methods.

5. Views:
    - **`index.blade`**: The view for the `BookController` lists books in a tabular format. It includes a search bar for finding books by title, a button to create new entries, and a table displaying book details like title, author, category, description, ISBN, total copies, and available copies. Each book row offers actions like updating, viewing details, and deleting the book entry.
    - **`show.blade`**: The view in the `BookController` displays detailed information about a specific book. It showcases the book's title, image, author, category, description, ISBN, total copies, and available copies in a structured layout. This view is read-only, presenting the details and offering options to update the book or navigate back to view all books.
    - **`create.blade`**: The view in the `BookController` facilitates the creation of a new book entry. It presents a form where users can input details such as the book's title, image, author, category, description, ISBN, total copies, and available copies. This view integrates form validation, displaying appropriate error messages when required fields are missing or contain invalid input. Upon successful creation, it displays a success message and offers the option to add another book or return to view all books.
    - **`delete.blade`**: The view in the `BookController` displays the details of a specific book that is about to be deleted. It showcases the book's image, title, author, category, description, ISBN, total copies, and available copies. Users are presented with a confirmation button to delete the book, triggering a prompt for confirmation. Additionally, there's an option to cancel the deletion and return to view all books. This view emphasizes confirmation before performing the deletion action to avoid accidental removal of the book entry.
    - **`edit.blade`**: The view in the `BookController` allows users to modify an existing book's details. It provides input fields to update the book's title, image, author, category, description, ISBN, total copies, and available copies. Users can select a new image for the book, choose from existing authors and categories, and update the necessary information. Upon submission, the form allows the user to update the book details and redirects them to view all books. The view also includes error messages for validation and a success alert for successful updates.
    - **`details.blade`**: The view presents a series of book cards, displaying essential information about each book in a grid layout. It fetches data about multiple books and exhibits details such as the book's title, image, author, category, and the number of available copies. Each card represents a book and includes these details, allowing users to browse through the collection of books. This view offers a concise overview of various books with their associated information for users to explore.

6. Routes: The routes defined for the `BookController` include:
    - **GET|HEAD `book`**: Displays a list of books. (`book.index -> BookController@index`)
    - **POST `book`**: Stores a new book in the database based on the submitted form data. (`book.store -> BookController@store`)
    - **GET|HEAD `book/create`**: Renders a form to create a new book. (`book.create -> BookController@create`)
    - **GET|HEAD `book/{book}`**: Shows details of a specific book. (`book.show -> BookController@show`)
    - **GET|HEAD `book/{book}/edit`**: Renders a form to edit the details of a specific book. (`book.edit -> BookController@edit`)
    - **PUT|PATCH `book/{book}`**: Updates the details of a specific book based on the submitted form data. (`book.update -> BookController@update`)
    - **GET|HEAD `book/{book}/delete`**: Displays a confirmation page to delete a specific book. (`book.delete -> BookController@delete`)
    - **GET|HEAD `search`**: Handles book search functionality, returning a list of books matching the query. (`book.search -> BookController@search`)
    - **DELETE `book/{book}`**: Deletes a specific book from the database. (`book.destroy -> BookController@destroy`)

### Category - Overview
1. Controller: 
The `CategoryController` oversees operations related to book categories within the Library Management System:
- **`index()`**: Retrieves all categories and presents a paginated view listing them.
- **`create()`**: Prepares the form for adding a new category.
- **`store(Request $request)`**: Manages the creation of a new category based on the submitted form data.
- **`show($id)`**: Displays detailed information about a specific category.
- **`edit($id)`**: Retrieves specific category details for editing purposes.
- **`update(Request $request, $id)`**: Handles the update of an existing category using the provided form data.
- **`delete($id)`**: Presents a confirmation view for deleting a specific category.
- **`destroy($id)`**: Executes the deletion of a category based on the given ID.

2. Model:
- **Attributes**: The `Category` model encapsulates fundamental attributes essential for managing book categories:
    - `name`: Represents the name of the category.
    - `description`: Contains a brief description or details about the category.
- **Relationships**: This model defines relationships with other entities:
    - `books()`: Establishes a one-to-many relationship with the `Book` model, indicating that a category can contain multiple books. This allows retrieval of all books associated with a specific category.

3. Interface: The `ICategoryService` interface delineates the contract for managing category-related functionalities within the Library Management System. It stipulates the methods that any implementation of this service must adhere to.
- Here's an overview:
    - **`GetAllCategories()`**: Fetches all categories from the data source.
    - **`CreateCategory(array $data)`**: Initiates the creation of a new category using the provided data.
    - **`GetCategoryById($id)`**: Retrieves a specific category based on its unique identifier (ID).
    - **`UpdateCategory($id, array $data)`**: Modifies the details of an existing category using the provided data and ID.
    - **`DeleteCategory($id)`**: Removes a specific category based on its unique identifier.

4. Service: The `CategoryService` class implements the `ICategoryService` interface. It handles the actual implementation of these methods, managing book-related functionalities within the system. This service class interacts with the database, performs data validation, executes CRUD operations (Create, Read, Update, Delete) operations for categories within the system.

5. Views:
    - **`index.blade`**: The view for the `CategoryController` lists books in a tabular format. It includes a button to create new entries, and a table displaying category details like name and description. Each category row offers actions like updating, viewing details, and deleting the category entry.
    - **`show.blade`**: The view in the `CategoryController` displays detailed information about a specific category. It showcases the name and description in a structured layout. This view is read-only, presenting the details and offering options to update the category or navigate back to view all categories.
    - **`create.blade`**: The view in the `CategoryController` facilitates the creation of a new category entry. It presents a form where users can input details such as the name and description of category. This view integrates form validation, displaying appropriate error messages when required fields are missing or contain invalid input. Upon successful creation, it displays a success message and offers the option to add another category or return to view all categories.
    - **`delete.blade`**: The view in the `CategoryController` displays the details of a specific category that is about to be deleted. It showcases the category's name and description. Users are presented with a confirmation button to delete the category, triggering a prompt for confirmation. Additionally, there's an option to cancel the deletion and return to view all categories. This view emphasizes confirmation before performing the deletion action to avoid accidental removal of the category entry.
    - **`edit.blade`**: The view in the `CategoryController` allows users to modify an existing category's details. It provides input fields to update the category's name and description. Upon submission, the form allows the user to update the category details and redirects them to view all categories. The view also includes error messages for validation and a success alert for successful updates.

6. Routes: The routes defined for the `CategoryController` include:
    - **GET|HEAD `category`**: Displays a list of categories. (`category.index -> CategoryController@index`)
    - **POST `category`**: Stores a new category in the database based on the submitted form data. (`category.store -> CategoryController@store`)
    - **GET|HEAD `category/create`**: Renders a form to create a new category. (`category.create -> CategoryController@create`)
    - **GET|HEAD `category/{category}`**: Shows details of a specific category. (`category.show -> CategoryController@show`)
    - **GET|HEAD `category/{category}/edit`**: Renders a form to edit the details of a specific category. (`category.edit -> CategoryController@edit`)
    - **PUT|PATCH `category/{category}`**: Updates the details of a specific category based on the submitted form data. (`category.update -> CategoryController@update`)
    - **GET|HEAD `category/{category}/delete`**: Displays a confirmation page to delete a specific category. (`category.delete -> CategoryController@delete`)
    - **DELETE `category/{category}`**: Deletes a specific category from the database. (`category.destroy -> CategoryController@destroy`)

### Contact - Overview
1. Controller Functions: 
- **`storeContact(Request $request)`**: Handles submitted contact forms, validating name, email, and message fields. Valid data creates a new entry in the database using the Contact model and redirects users to the home page with a success message confirming the message sending.

2. Model:
- **Attributes**: The `Contact` model encapsulates fundamental attributes essential for managing inquiries within the system:
    - `name`: Represents the name of the person making the inquiry.
    - `email`: Contains the email address of the inquirer.
    - `message`: Stores the content of the inquiry or message sent.

3. Views:
    - **`contact.blade`**: This view presents a contact form allowing users to submit inquiries. It collects the user's name, email address, and message. Validation errors are displayed inline, and upon successful submission, the form data is sent to the contact.store route for processing.

4. Routes: The routes defined for the `ContactController` include:
    - **GET|HEAD `contact`**: Displays a contact form for user inquiries. (`home.contact-> HomeController@contact`)
    - **POST `contact`**: Processes and stores the submitted contact form data in the database. (`contact.store -> ContactController@store`)

### Dashboard - Overview
1. Controller Functions: 
- **`index()`**:  function typically handles rendering the dashboard view. Although the provided code doesn't fully align with this function's usual purpose, it often manages user authentication, retrieves user-related data, and displays necessary information upon successful login.

2. Views:
    - **`dashboard.blade`**: This view confirms successful user login and, if applicable, displays a success alert based on session status. The provided code showcases a basic card layout within a container, indicating successful login status to the users.

3. Routes: The routes defined for the `DashboardController` include:
    - **GET|HEAD `dashboard`**: This route directs users to view the dashboard (`DashboardController@index`), but the view described seems more related to user login confirmation rather than an actual dashboard.

### Home - Overview
1. Controller: controls various views related to the home section of the application:
    - **`index()`**: Renders the main landing page or homepage (`home.index`). It often contains essential information about the application, highlights, or navigation links.
    - **`contact()`**: Displays the contact form or contact information page (`home.contact`). It provides a means for users to reach out for inquiries or feedback.

2. Views:
    - **`home.index`**: The view provide visitors with news updates, establishment opening hours, and information about upcoming events in a visually appealing format.
    - **`home.contact`**:  The view features a centered contact form where users can input their name, email, and message to reach out with inquiries or feedback. It includes validation for each field and a submission button to send the message.

3. Routes: The routes defined for the `HomeController` include:
    - **GET `/` (Root)**: This route directs users to the `home.index` view by calling `HomeController@index`. It serves as the landing page or main entry point of the application.
    - **GET `contact`**: This route forwards users to the `HomeController@contact` method, which typically manages the view for the contact page (`home.contact`). It facilitates users access to the contact section of the application.

### Loan - Overview
1. Controller:
The `LoanController` is responsible for handling various loan-related functionalities within the application. It interacts with services responsible for managing loans, users, and books. Here's a breakdown:
- **`index()`**: Retrieves all loans and presents them in the `loan.index` view, accommodating pagination.
- **`create()`**: Prepares the form for creating a new loan. It gathers necessary data for users and books to populate dropdowns in the `loan.create` view.
- **`store(Request $request)`**: Handles the creation of a new loan based on the submitted form data and redirects to the index view with a success message.
- **`show($id)`**: Retrieves and displays detailed information about a specific loan in the `loan.show` view.
- **`edit($id)`**: Retrieves the details of a specific loan, along with user and book data, to populate the form in the `loan.edit` view for updating purposes.
- **`update(Request $request, $id)`**: Manages the update of an existing loan using the provided form data and redirects to the index view with a success message.
- **`delete($id)`**: Retrieves information about a loan to be deleted and presents a confirmation view in `loan.delete`.
- **`destroy($id)`**: Executes the deletion of a loan based on the given ID and redirects to the index view.

2. Model:
- **Attributes**: The `Loan` model manages essential attributes for loan management:
    - `user_id`: Represents the ID of the user associated with the loan.
    - `book_id`: Represents the ID of the book associated with the loan.
    - `due_date`: Indicates the date by which the loaned item should be returned.
    - `returned_at`: Tracks the date and time when the loaned item was returned, if applicable.
- **Relationships**: This model defines relationships with other entities:
    - `user()`: Specifies that a loan "belongs to" a user. This relationship (`one-to-many`) indicates that each loan is associated with a specific user through the `user_id` field. Using the `belongsTo()` function, this relationship is defined with the `User` model.
    - `book()`: Establishes a relationship (`one-to-many`) where a loan is associated with a book. This means that each loan is linked to a particular book through the `book_id` field. Using the `belongsTo()` function, this relationship is defined with the `Book` model.

3. Interface: The `ILoanService` interface outlines the contract for managing loan-related functionalities within the system. It defines the methods that any implementation of this service must comply with:
    - **`GetAllLoans()`**: Retrieves all loans from the data source.
    - **`CreateLoan(array $data)`**: Initiates the creation of a new loan using the provided data.
    - **`GetLoanById($id)`**: Fetches a specific loan based on its unique identifier (ID).
    - **`UpdateLoan($id, array $data)`**: Modifies the details of an existing loan using the provided data and ID.
    - **`DeleteLoan($id)`**: Removes a specific loan based on its unique identifier.

4. Service: The `LoanService` class implements the `ILoanService` interface. It handles the actual implementation of these methods, managing book-related functionalities within the system. This service class interacts with the database, performs data validation, executes CRUD operations (Create, Read, Update, Delete) operations for loans within the system.

5. Views:
    - **`index.blade`**: The view for the `LoanController` displays a tabular representation of loans. It contains a button allowing users to create new entries and a table showing loan details such as user, book, due date, and return date. Each row in the table provides actions like updating, viewing details, and deleting the loan entry.
    - **`show.blade`**: The view in the `LoanController` displays detailed information about a specific loan. It shows the user, book, due date, and return date in separate read-only input fields. Additionally, it offers options to update the loan entry or navigate back to view all loans.
    - **`create.blade`**: The view in the `LoanController` allows users to create a new loan entry. It provides a form with fields to select a user and a book, set the due date, and enter the return date. Form validation prompts error messages when required fields are empty or contain invalid inputs. Upon successful creation, users can view a success message and navigate back to view all loans.
    - **`delete.blade`**: The view in the `LoanController` displays details of a specific loan entry slated for deletion. It presents information such as the user, associated book, due date, and the option to confirm the deletion. Users are prompted to confirm before the deletion is executed, reducing the risk of accidental removal. Additionally, it includes an option to return to the list of all loan entries, ensuring control and preventing inadvertent deletions.
    - **`edit.blade`**: The view in the `LoanController` enables users to modify existing loan details. It presents input fields to update the user, associated book, due date, and return date of the loan. This view includes form validation, displaying error messages when required fields are missing or contain invalid input. Upon successful update, it redirects users to view all loan entries. Additionally, it offers an option to cancel the update and return to the list of all loan entries.

6. Routes: The routes defined for the `LoanController` include:
    - **GET|HEAD `loan`**: Displays a list of loans. (`loan.index -> LoanController@index`)
    - **POST `loan`**: Stores a new loan in the database based on the submitted form data. (`loan.store -> LoanController@store`)
    - **GET|HEAD `loan/create`**: Renders a form to create a new loan. (`loan.create -> LoanController@create`)
    - **GET|HEAD `loan/{loan}`**: Shows details of a specific loan. (`loan.show -> LoanController@show`)
    - **GET|HEAD `loan/{loan}/edit`**: Renders a form to edit the details of a specific loan. (`loan.edit -> LoanController@edit`)
    - **PUT|PATCH `loan/{loan}`**: Updates the details of a specific loan based on the submitted form data. (`loan.update -> LoanController@update`)
    - **GET|HEAD `loan/{loan}/delete`**: Displays a confirmation page to delete a specific loan. (`loan.delete -> LoanController@delete`)
    - **DELETE `loan/{loan}`**: Deletes a specific loan from the database. (`loan.destroy -> LoanController@destroy`)

### Notification - Overview
1. Controller:
The `NotificationController` manages notification-related functionalities. It interacts with services handling notifications, users, and loan data. Here's a breakdown of its key methods:
- **`index()`**:  Retrieves all notifications for loans, presenting them in the `notification.index` view, facilitating pagination.
- **`create()`**: Prepares the form for new notification creation, gathering necessary user data and notification details for the `notification.create` view.
- **`store(Request $request)`**: Handles the creation of a new notification based on form data and redirects to the index view with a success message upon success.
- **`show($id)`**: Retrieves and displays detailed information about a specific notification in the `notification.show` view.
- **`edit($id)`**: Gathers details of a specific notification and associated user data to populate the `notification.edit` view for updates.
- **`update(Request $request, $id)`**: Manages the update of an existing notification using provided form data and redirects to the index view with a success message.
- **`delete($id)`**: Retrieves information about a notification to be deleted and presents a confirmation view in `notification.delete`.
- **`destroy($id)`**: Executes the deletion of a notification based on the given ID and redirects to the index view.

2. Model:
- **Attributes**: The `Notification` model manages crucial attributes for notification handling:
    - `user_id`: Represents the ID of the user associated with the notification.
    - `message`: Holds the content or details of the notification message.
    - `returned_at`: Tracks the date and time when the notification was read, if applicable.
- **Relationships**: This model defines relationships with other entities:
    - `user()`: Establishes a `many-to-one` relationship that a notification "belongs to" a user. This relation signifies that each notification is linked to a specific user through the user_id field. By using the `belongsTo()` function, this relationship is defined with the `User` model.

3. Interface: The `INotificationService` interface outlines the contract for managing notification-related functionalities within the system. It defines the methods that any implementation of this service must comply with:
    - **`GetAllNotifications()`**: Retrieves all notifications from the data source.
    - **`CreateNotification(array $data)`**: Initiates the creation of a new notification using the provided data.
    - **`GetNotificationById($id)`**: Fetches a specific notification based on its unique identifier (ID).
    - **`UpdateNotification($id, array $data)`**: Modifies the details of an existing notification using the provided data and ID.
    - **`DeleteNotification($id)`**: Removes a specific notification based on its unique identifier.

4. Service: The `NotificationService` class implements the `INotificationService` interface. It handles the actual implementation of these methods, managing book-related functionalities within the system. This service class interacts with the database, performs data validation, executes CRUD operations (Create, Read, Update, Delete) operations for notifications within the system.

5. Views:
    - **`index.blade`**: The view for the `NotificationController` displays a table of notifications, presenting user, message, and read-at date information. Users can perform various actions like editing, viewing details, and deleting specific notification entries using the action buttons provided. Additionally, it includes a button allowing the creation of new entries.
    - **`show.blade`**: The view in the `NotificationController` renders detailed information about a specific notification. It showcases user details, the notification message, and the read-at timestamp in separate read-only input fields. The view facilitates an option to update the notification entry or navigate back to view all notifications using corresponding buttons.
    - **`create.blade`**: The view in the `NotificationController` allows users to generate a new notification entry. It presents a form with fields to select a user, input a message, and specify a read-at timestamp. The form integrates validation checks to prompt error messages if mandatory fields are empty or contain invalid data. Upon successful creation, users receive a success message and can navigate back to view all notifications using a dedicated button.
    - **`delete.blade`**: The view in the `NotificationController` displays specific details of a notification intended for deletion. It showcases information like the user, associated message, and the read-at timestamp, allowing users to verify the notification before deletion. To ensure deliberate action, it presents a confirmation button triggering a prompt for user confirmation before executing the deletion process. Additionally, it offers an option to return to the list of all notifications, maintaining control and preventing inadvertent deletions.
    - **`edit.blade`**: The view in the `NotificationController` enables users to modify existing notification details. It offers input fields for updating the user, message, and read-at timestamp. Form validation ensures data accuracy, displaying error messages for empty or invalid inputs. Successful updates redirect users to view all notifications, and it provides an option to cancel and return to the notification list.

6. Routes: The routes defined for the `NotificationController` include:
    - **GET|HEAD `notification`**: Displays a list of notifications. (`notification.index -> NotificationController@index`)
    - **POST `notification`**: Stores a new notification in the database based on the submitted form data. (`notification.store -> NotificationController@store`)
    - **GET|HEAD `notification/create`**: Renders a form to create a new notification. (`notification.create -> NotificationController@create`)
    - **GET|HEAD `notification/{notification}`**: Shows details of a specific notification. (`notification.show -> NotificationController@show`)
    - **GET|HEAD `notification/{notification}/edit`**: Renders a form to edit the details of a specific notification. (`notification.edit -> NotificationController@edit`)
    - **PUT|PATCH `notification/{notification}`**: Updates the details of a specific notification based on the submitted form data. (`notification.update -> NotificationController@update`)
    - **GET|HEAD `notification/{notification}/delete`**: Displays a confirmation page to delete a specific notification. (`notification.delete -> NotificationController@delete`)
    - **DELETE `notification/{notification}`**: Deletes a specific notification from the database. (`notification.destroy -> NotificationController@destroy`)

### Permission - Overview
1. Controller: 
The `PermissionController` handles operations related to managing permissions within the application. The controller requires that the user must be authenticated and possess the role or permission of "admin", "create user", "create role", or "create permission" before accessing these functionalities. Methods:
- **`index()`**: Fetches a list of all permissions and presents them in the `permission.index` view, offering pagination.
- **`create()`**: Prepares the form for creating a new permission.
- **`store(Request $request)`**: Manages the creation of a new permission in the database using form data, redirects the user to the permissions list view with a success message upon successful creation.
- **`edit($id)`**: Retrieves details of a specific permission for editing.
- **`update(Request $request, $id)`**: Handles updating specific permission data, redirects to the permissions list view with a success message upon successful update.
- **`destroy($id)`**: Manages the deletion of a specific permission from the database, redirects the user to the permissions list view with a success message upon successful deletion.

2. Model:
- **Attributes**: The `Permission` model handles essential attributes for permission management:
    - `id`: Represents the unique identifier for each permission.
    - `name`: Holds the name of the permission.
    - `guard_name`: Indicates the guard name associated with the permission.

3. Interface: The `IPermissionService` interface serves as a contract for managing permission-related functionalities within the system. It establishes the methods that any implementation of this service must adhere to:
    - **`GetAllPermission()`**: Retrieves all permissions from the data source.
    - **`CreatePermission(array $data)`**: Initiates the creation of a new permission using the provided data.
    - **`GetPermissionById($id)`**: Fetches a specific permission based on its unique identifier (ID).
    - **`UpdatePermission($id, array $data)`**: Modifies the details of an existing permission using the provided data and ID.
    - **`DeletePermission($id)`**: Removes a specific permission based on its unique identifier.

4. Service: The `PermissionService` class implements the `INotificationService` interface. It handles the actual implementation of these methods, managing book-related functionalities within the system. This service class interacts with the database, performs data validation, executes CRUD operations (Create, Read, Update, Delete) operations for notifications within the system.

5. Views:
    - **`index.blade`**: The view for the `PermissionController` presents a table of notifications, displaying user, message, and read-at date information. It enables users to execute various actions like editing, viewing details, and deleting specific notification entries through provided action buttons. Additionally, it features a button facilitating the creation of new entries.
    - **`create.blade`**: The view in the `PermissionController`  enables users to generate a new permission entry. It presents a form with fields to input the permission name. Validation checks are integrated to handle empty or invalid inputs, displaying error messages accordingly. After successful creation, users receive a confirmation message and can return to view all permissions using a dedicated button.
    - **`edit.blade`**: The view in the `PermissionController` enables users to modify existing permission details. It provides input fields to update the permission name. Form validation ensures accurate data, displaying error messages for empty or invalid inputs. Successful updates redirect users to view all permissions, with an option to cancel and return to the permission list.

6. Routes: The routes defined for the `PermissionController` include:
    - **GET|HEAD `permission`**: Displays a list of notifications. (`permission.index -> PermissionController@index`)
    - **POST `permission`**: Stores a new permission in the database based on the submitted form data. (`permission.store -> PermissionController@store`)
    - **GET|HEAD `permission/create`**: Renders a form to create a new permission. (`permission.create -> PermissionController@create`)
    - **GET|HEAD `permission/{permission}`**: Shows details of a specific permission. (`permission.show -> PermissionController@show`)
    - **GET|HEAD `permission/{permission}/edit`**: Renders a form to edit the details of a specific permission. (`permission.edit -> PermissionController@edit`)
    - **PUT|PATCH `permission/{permission}`**: Updates the details of a specific permission based on the submitted form data. (`permission.update -> PermissionController@update`)
    - **DELETE `permission/{permission}`**: Deletes a specific permission from the database. (`permission.destroy -> PermissionController@destroy`)

### Review - Overview
1. Controller:
The `ReviewController` organize various functionalities related to managing reviews within the application:
- **`index()`**: Retrieves a paginated list of all reviews and displays them in the `review.index` view.
- **`create()`**: Prepares the form for creating a new review, fetching necessary user and book information.
- **`store(Request $request)`**:  Manages the creation of a new review in the database using form data, then redirects the user to the reviews list view with a success message upon successful creation.
- **`show($id)`**: Fetches details of a specific review for display in the `review.show` view.
- **`edit($id)`**: Retrieves details of a specific review for editing.
- **`update(Request $request, $id)`**: Handles the update of specific review data, redirecting to the reviews list view with a success message upon successful update.
- **`delete($id)`**:  Fetches details of a specific review to confirm its deletion in the `review.delete` view.
- **`destroy($id)`**: Manages the deletion of a specific review from the database, redirects the user to the reviews list view with a success message upon successful deletion.

2. Model:
- **Attributes**: 
    - `user_id`: Represents the ID of the user associated with the review.
    - `book_id`: Indicates the ID of the book being reviewed.
    - `rating`: Holds the rating assigned to the book in the review.
    - `comment`: Contains the textual feedback or comments provided in the review.
- **Relations**:
    - `user()`: Describes that a review "belongs to" a user and `many-to-one` relationship. Each review has a single associated user. This relationship is established through the `user()` method, which uses the `belongsTo()` function.
    - `book()`: Indicates that a review "belongs to" a book and `many-to-one` relationship. Each review is linked to a single book. Similar to `user()`, the `book()` method utilizes `belongsTo()` to define this relationship.

3. Interface: The `IReviewService` interface serves as a contract for managing review-related functionalities within the system. It establishes the methods that any implementation of this service must adhere to:
    - **`GetAllReviews()`**: Retrieves all reviews from the data source.
    - **`CreateReview(array $data)`**: Initiates the creation of a new review using the provided data.
    - **`GetReviewById($id)`**: Fetches a specific review based on its unique identifier (ID).
    - **`UpdateReview($id, array $data)`**: Modifies the details of an existing review using the provided data and ID.
    - **`DeleteReview($id)`**: Removes a specific review based on its unique identifier.

4. Service: The `ReviewService` class implements the `IReviewService` interface. It handles the actual implementation of these methods, managing book-related functionalities within the system. This service class interacts with the database, performs data validation, executes CRUD operations (Create, Read, Update, Delete) operations for review within the system.

5. Views:
    - **`index.blade`**: The view for the `ReviewController` allows users to execute various actions like editing, viewing details, and deleting specific notification entries via dedicated action buttons. Furthermore, it includes a convenient button to create new notification entries.
    - **`create.blade`**: The view in the `ReviewController` provides a form with fields to input user details, select a book, specify a rating, and add comments. The form integrates validation checks to ensure mandatory fields are filled and handle any erroneous or missing inputs, displaying relevant error messages. Upon successful creation, users receive a confirmation message and have the option to return to view all permissions via a dedicated button.
    - **`edit.blade`**: The view in the `ReviewController` provides fields to input user, book, rating, and comment associated with the review. Validation checks ensure data accuracy, displaying error messages for empty or invalid fields. Upon successful update, users are redirected to view all reviews, with an option to return to the review list.
    - **`show.blade`**: This view in the `ReviewController` offers a detailed display of a specific review's information. It showcases the associated user's name, book title, rating, and comment, presented in read-only fields for review details. Users can view these details but cannot modify them directly. The interface also provides options to update the review or return to view all reviews.
    - **`delete.blade`**: This view in the `ReviewController` displays the details of the review, including associated user, book, rating, and comment, presented in read-only fields, ensuring users can review the information before deletion. The interface includes a confirmation button to delete the review and an option to return to view all reviews.

6. Routes: The routes defined for the `ReviewController` include:
    - **GET|HEAD `review`**: Displays a list of reviews. (`review.index -> ReviewController@index`)
    - **POST `review`**: Stores a new review in the database based on the submitted form data. (`review.store -> ReviewController@store`)
    - **GET|HEAD `review/create`**: Renders a form to create a new review. (`review.create -> ReviewController@create`)
    - **GET|HEAD `review/{review}`**: Shows details of a specific review. (`review.show -> ReviewController@show`)
    - **GET|HEAD `review/{review}/delete`**: Renders a form to edit the details of a specific review. (`review.delete -> ReviewController@delete`)
    - **GET|HEAD `review/{review}/edit`**: Renders a form to edit the details of a specific review. (`review.edit -> ReviewController@edit`)
    - **PUT|PATCH `review/{review}`**: Updates the details of a specific review based on the submitted form data. (`review.update -> ReviewController@update`)
    - **DELETE `review/{review}`**: Deletes a specific review from the database. (`review.destroy -> ReviewController@destroy`)

### Role - Overview
1. Controller:
The `RoleController` manages role-related functionalities within the application:
- **`index()`**: Retrieves a paginated list of all roles and displays them in the `role.index` view.
- **`create()`**: Prepares the form required to create a new role, gathering necessary permission information to associate with the role.
- **`store(Request $request)`**: Handles the creation of a new role by storing the submitted form data in the database. Upon successful creation, it redirects users to the roles list view (`role.index`) with a success message confirming the role's addition.
- **`show($id)`**: Fetches details of a specific review for display in the `review.show` view.
- **`edit($id)`**:  Retrieves the details of a specific role.
- **`update(Request $request, $id)`**: Manages the update process for a specific role based on the submitted form data. After successful modification, it redirects users to the roles list view (`role.index`) with a success message confirming the update.
- **`destroy($id)`**: Handles the deletion process of a specific role from the database. Upon successful deletion, users are redirected to the roles list view (`role.index`) with a success message confirming the role's removal.

2. Model: 
The `Role` model manages roles in the permission system:
    - **Attributes**: Tracks `id`, `name`, and `guard_name` (guard type).
    - **Relations**:
        - `permissions()`: This method establishes the relationship between roles and permissions. It represents a "many-to-many" relationship (BelongsToMany). The connection is made through the role_has_permissions table, where the associations between roles and permissions are stored.
        - `users()`:  Indicates that the role belongs to the users of the model associated with its guard. It's also a "many-to-many" relationship, but this time it's morphic. It's established through the `model_has_roles` table, where the relationships between roles and user models are stored.
    - **Methods**: Handles role creation, finding by name or ID, permission verification, and default guard handling.

3. Interface: The `IRoleService` interface serves as a contract for managing role-related functionalities within the system. It establishes the methods that any implementation of this service must adhere to:
    - **`GetAllRoles()`**: Retrieves all roles from the data source.
    - **`CreateRole(array $data)`**: Initiates the creation of a new role using the provided data.
    - **`GetRoleById($id)`**: Fetches a specific role based on its unique identifier (ID).
    - **`UpdateRole($id, array $data)`**: Modifies the details of an existing role using the provided data and ID.
    - **`DeleteRole($id)`**: Removes a specific role based on its unique identifier.

4. Service: The `RoleService` class implements the `IRoleService` interface. It handles the actual implementation of these methods, managing book-related functionalities within the system. This service class interacts with the database, performs data validation, executes CRUD operations (Create, Read, Update, Delete) operations for role within the system.

5. Views:
    - **`index.blade`**: The view in the `RoleController` presents a card titled "Roles" enabling the addition of a new role via a button and displays a table listing all roles. For each role, it showcases the name, associated permissions, and creation date. Actions for each role include the ability to edit permissions and delete the role, with a confirmation prompt for deletion. When there are no records, it shows a message stating "No Record found".
    - **`create.blade`**: The view in the `RoleController` includes validation checks for mandatory fields and error message handling for any missing or incorrect inputs. After successful creation, users receive a confirmation message and can return to view all roles using a dedicated button. The form includes fields for role name input and assigning permissions via checkboxes.
    - **`edit.blade`**: The view in the `RoleController` offers input fields to adjust role names and checkboxes to assign permissions associated with the role. Validation mechanisms ensure data accuracy, prompting error messages for any empty or invalid fields. Upon successful update, users are redirected to view all roles, with the option to return to the role list. The page incorporates a form enabling users to conveniently update and manage role-specific details.

6. Routes: The routes defined for the `RoleController` include:
    - **GET|HEAD `role`**: Displays a list of roles. (`role.index -> RoleController@index`)
    - **POST `role`**: Stores a new role in the database based on the submitted form data. (`role.store -> RoleController@store`)
    - **GET|HEAD `role/create`**: Renders a form to create a new role. (`role.create -> RoleController@create`)
    - **GET|HEAD `role/{role}`**: Shows details of a specific role. (`role.show -> RoleController@show`)
    - **GET|HEAD `role/{role}/edit`**: Renders a form to edit the details of a specific role. (`role.edit -> RoleController@edit`)
    - **PUT|PATCH `role/{role}`**: Updates the details of a specific role based on the submitted form data. (`role.update -> RoleController@update`)
    - **DELETE `role/{role}`**: Deletes a specific role from the database. (`role.destroy -> RoleController@destroy`)

### User - Overview
1. Controller:
The `UserController` manages user-related functionalities within the application:
- **`index()`**: Retrieves a paginated list of users along with their associated roles and permissions to display in the `user.index` view.
- **`create()`**: Prepares the form required for creating a new user, gathering necessary role information for user association.
- **`store(Request $request)`**: Handles the creation of a new user by storing the submitted form data in the database. Upon successful creation, it redirects users to the user list view (`user.index`) with a success message confirming the profile addition.
- **`profile`()**: Displays the user's profile details in the `profile.index` view.
- **`postProfile(Request $request, $id)`**: Manages the update process for the user's profile based on the submitted form data.
- **`getPassword()`**: Displays the view to change the user's password in `profile.password`.
- **`postPassword(Request $request)`**: Handles the user's password update process.
- **`changePhoto()`**: Displays the view to change the user's profile photo in `profile.changePhoto`.
- **`imageUpload(Request $request)`**: Manages the user's profile photo upload process and performs validations on the uploaded image.
- **`search(Request $request)`**: Conducts a search for users based on the query input, displaying the results in the `user.index` view.
- **`destroy($id)`**: Deletes a specific user from the database. Upon successful deletion, redirects users to the user list view (`user.index`) with a success message confirming the profile removal.

2. Model: 
The User model extends Laravel's Authenticatable, managing user-related data and interactions within the system:
    - **Attributes**: Tracks user attributes such as `name`, `email`, `password`, and `photo`.
    - **Relations**: Establishes connections with other models:
        -`reviews()`: Defines a one-to-many relationship indicating that a user can have multiple reviews. Implemented through the `hasMany()` method, linking the `User` model to the `Review` model. This assumes that the reviews table contains a field referencing the user for each review.
        -`role()`: Indicates that each user belongs to a specific role. It uses the `belongsTo()` relationship, suggesting that the users table contains a field pointing to the user's role. The expected field name is likely to be `role_id`.
    - **Methods**: Handles role creation, finding by name or ID, permission verification, and default guard handling.

3. Interface: The `IUserService` interface serves as a contract for managing user-related functionalities within the system. It establishes the methods that any implementation of this service must adhere to:
    - **`GetAllUsers()`**: Retrieves all user from the data source.
    - **`CreateUser(array $data)`**: Initiates the creation of a new user using the provided data.
    - **`GetUserById($id)`**: Fetches a specific user based on its unique identifier (ID).
    - **`UpdateProfile($id, array $data)`**: Modifies the details of an existing user using the provided data and ID.
    - **`UpdatePassword($id)`**: Updates the password of a specific user based on its unique identifier.
    - **`DeleteUser($id)`**: Removes a specific user based on its unique identifier.
    - **`SearchUsers`**: Searches for users based on the provided query parameters.
    - **`UploadProfilePhoto($user, $imageData)`**: Uploads and sets the profile photo for a specific user using the provided user and image data.

4. Service: The `UserService` class implements the `IUserService` interface. It handles the actual implementation of these methods, managing book-related functionalities within the system. This service class interacts with the database, performs data validation, executes CRUD operations (Create, Read, Update, Delete) for user entities. Additionally, this service facilitates user searching operations and image uploading, adhering to the defined interface methods.

5. Views:
    - **`index.blade`**: The view in the `UserController` presents a card titled "Users" that allows the addition of a new user through a button and displays a table listing all users. Each user's details such as name, associated role(s), email, and creation date are showcased. Actions available for each user include viewing details, editing the profile, and deleting the user, with a confirmation prompt for deletion. When there are no records available, it displays a message stating "No Records Found".
    - **`index.blade`**(`profile`): The view in the `UserController`presents the user profile section within the admin layout. The layout displays user details such as their profile image, name, associated role(s), and email. Additionally, it includes an "Edit Profile" section allowing users to modify their name and email address. Any changes made are processed via a form submission to update the user's profile information.
    - **`changePhoto.blade`**(`profile`): The view in the `UserController` likely serves the purpose of allowing users to upload or change their profile picture. It includes an image upload feature with an interface for selecting an image file, displaying a preview of the chosen image, and utilizing the Cropper.js library for image cropping functionality. Upon cropping the image, it likely updates the profile picture for the user.
    - **`password.blade`**(`profile`): The view in the `UserController` serves as a view for changing a user's password. It includes a form with fields to input a new password and confirm the new password. The form submission is handled by the route userPostPassword, and it incorporates CSRF protection.

6. Routes: The routes defined for the `UserController` include:
    - **GET|HEAD `user`**: Displays a list of users. (`user.index -> UserController@index`)
    - **POST `user`**: Stores a new user in the database based on the submitted form data. (`user.store -> UserController@store`)
    - **GET|HEAD `user/search`**: Searches for users within the system. (`user.search -> UserController@search`)
    - **GET|HEAD `user/create`**: Renders a form to create a new user. (`user.create -> UserController@create`)
    - **GET|HEAD `changePhoto`**: Displays a form to change the profile photo. (`profileChangePhoto -> UserController@changePhoto`)
    - **GET|HEAD `profile`**: Displays the user's profile. (`user.profile -> UserController@profile`)
    - **GET|HEAD `user/{user}/edit`**: Renders a form to edit the details of a specific user. (`user.edit -> UserController@edit`)
    - **PUT `profile/{id}`**: Updates the user's profile based on the submitted form data. (`user.postProfile -> UserController@postProfile`)
    - **GET|HEAD `password/change`**: Displays a form to change the password. (`userGetPassword -> UserController@getPassword`)
    - **POST `password/change`**: Changes the user's password based on the submitted form data. (`userPostPassword -> UserController@postPassword`)
    - **PUT|PATCH `user/{user}`**: Updates the details of a specific user based on the submitted form data. (`user.update -> UserController@update`)
    - **DELETE `user/{user}`**: Deletes a specific role from the database. (`user.destroy -> UserController@destroy`)

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


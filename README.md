<h1>Challenge</h1>

<h2>Table of Contents</h2>

<ul>
  <li><a href="#project-description">Project Description</a></li>
  <li><a href="#features">Features</a></li>
  <li><a href="#installation">Installation</a></li>
  <li><a href="#usage">Usage</a></li>
  <li><a href="#testing">Testing</a></li>
  <li><a href="#contributing">Contributing</a></li>
  <li><a href="#license">License</a></li>
</ul>

<h2 id="project-description">Project Description</h2>

suppose in a sample system, each employee has two user roles (registrant and reviewer) and the system is supposed to assign a document to a person based on priority and creation time.
<h2 id="features">Features</h2>


<ul>
  <li>After the time of appointment, another person does not have access to it for registration and inspection purposes</li>
  <li>After the end of the appointment period, if the status of the document does not change to registration and verification, it will return to the post-appointment cycle (basic status)</li>
  <li>The employee can withdraw from the appointment that has been given and that document can no longer be viewed for review or registration.
</li>

</ul>

# Installation

1.Clone the repository:

`git clone https://github.com/Amirhf1/challenge`

2.Navigate to the project directory:

`cd challenge`

3.Install the dependencies using Composer:

`composer install`

4.Configure the environment variables by renaming the `.env.example` file to `.env` and updating the necessary values (database, mail, etc.).

5.Generate the application key:

`php artisan key:generate`

6.Run the database migrations:

`php artisan migrate`

7.Start the development server:

`php artisan serve`

8.The application should now be accessible at http://localhost:8000.

## Install with Docker

**Clone repository and go to repository directory**

`cp .env.example .env`

`composer i`

`docker-compose build`

`make up`

## Running Tests

To run tests, run the following command

```bash
make test 
```

Code coverage report (HTML)
```bash
make html 
```

## Code Style

Improve code style with **[laravel/pint](https://github.com/laravel/pint)**

Show the parts that have problems
```bash
make pint-test 
``` 
Fix the parts that have problems
```bash
make pint  
```

<h2 id="contributing">Contributing</h2>

<p>Specify how others can contribute to your project. You can include guidelines for reporting issues, submitting feature requests, or making pull requests. Mention any coding conventions, standards, or guidelines that contributors should follow. Provide instructions for setting up the development environment and making contributions.</p>

<h2 id="license">License</h2>

<p>Indicate the license under which your project is distributed. For example:</p>

<p>This project is licensed under the <a href="https://opensource.org/licenses/MIT">MIT License</a>.</p>

<p>You can customize the sections and content of the `README.md` file based on your project's specific needs. Make sure to provide clear instructions and relevant information to help users understand and use your project effectively.</p>

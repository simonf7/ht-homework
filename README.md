# Hidden Talents Homework Exercise

## Set up (from project root)
```bash
composer install
bin/console doctrine:database:create
bin/console doctrine:schema:update --force
bin/console server:run
```

## Goals
- Add a description field to the task table, creating a migration in the process.
- Add the description field to the form, the description field must not allow submissions with descriptions under 10 characters.
- Add description to the listing table
- Change sorting order of table to be by due date instead of id
- Amend the functional test to include the new field
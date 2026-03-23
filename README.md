# SymfonyBugTrackerBundle
This bundle allows to track bugs in your application and automatically create issues with all the information required on your repository.
## Testing

```bash
# Install dependencies
composer install

# Run all tests
vendor/bin/phpunit

# Run a single file
vendor/bin/phpunit tests/Path/To/FooTest.php

# Run a specific method
vendor/bin/phpunit --filter testMethodName
```

### Via Swan host app

Tests also run through the Swan Docker container (from the Swan project root):

```bash
docker compose exec swan-php vendor/bin/phpunit vendor/starx/symfony-bug-tracker/tests

# Single file
docker compose exec swan-php vendor/bin/phpunit vendor/starx/symfony-bug-tracker/tests/Path/To/FooTest.php

# Specific method
docker compose exec swan-php vendor/bin/phpunit --filter testMethodName vendor/starx/symfony-bug-tracker/tests
```

# Contributing

Thank you for considering contributing to our project! We welcome any contributions, whether it's reporting a bug, submitting a feature request, or writing code.

To ensure a smooth and collaborative process, please review the following guidelines before making your contribution.

## HTML Attributes

We follow the [CodeGuide.co](https://codeguide.co/#attribute-order) recommendations for ordering HTML attributes. This helps to keep the code consistent and readable. [See more](https://codeguide.co/#attribute-order).

- `class`
- `id`, `name`
- `data-*`
- `src`, `for`, `type`, `href`, `value`
- `title`, `alt`
- `role`, `aria-*`
- `tabindex`
- `style`

## Commits

We follow the [Conventional Commits](https://www.conventionalcommits.org/en/v1.0.0-beta.4/) specification for our commit messages. This helps us to automate our release process and to generate a clear and concise changelog. [See more](https://www.conventionalcommits.org/en/v1.0.0-beta.4/).

- `feat`: A new feature
- `fix`: A bug fix
- `refactor`: A code change that neither fixes a bug nor adds a feature
- `perf`: A code change that improves performance
- `style`: Changes that do not affect the meaning of the code (white-space, formatting, missing semi-colons, etc)
- `test`: Adding missing tests or correcting existing tests
- `docs`: Documentation only changes
- `build`: Changes that affect the build system or external dependencies (example scopes: gulp, broccoli, npm)
- `ci`: Changes to our CI configuration files and scripts (example scopes: Travis, Circle, BrowserStack, SauceLabs)
- `chore`: Other changes that don't modify src or test files
- `revert`: Reverts a previous commit

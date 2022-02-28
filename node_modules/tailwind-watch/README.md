# Tailwind Watch

A dead-simple package to intelligently watch your project for Tailwind-specific files and rebuild when they change.

This tool does not install PostCSS, Tailwind, or anything else. Install those yourself and use this tool to watch your files and rebuild when they change.

## Why might you use this?

- You're having difficulty getting Tailwind/PostCSS working in your project
- You're tired of configuring Tailwind and PostCSS through bundlers like Webpack and Rollup
- You've evolved past bundlers to Skypack but still want to use Tailwind
- You want control over all PostCSS and Tailwind via configuration files in your project root
- You want hands-free watching and building, depending on `.env` variables and `process.env.NODE_ENV`

## Installation & Usage

First, install the package:
```
npm i -D tailwind-watch
```

If you don't already, make sure you've at least got PostCSS and Tailwind installed:
```
npm i -D postcss postcss-cli tailwindcss
```

Then, add input and output values to your `.env` file, or create it if it does not already exist, like so:

```dotenv
TAILWIND_IN=src/input.css
TAILWIND_OUT=dist/output.css
```

Finally, add the proper commands to your `package.json` scripts. This works best by tying your existing commands together with something like `npm-run-all`. Here's an example of how you might tie this package together with Eleventy:

```json
{
  "scripts": {
    "build": "NODE_ENV=production npm-run-all build:*",
    "build:eleventy": "eleventy",
    "build:tailwind": "tailwind-watch",
    "dev": "npm-run-all dev:*",
    "dev:eleventy": "eleventy --serve --quiet",
    "dev:tailwind": "tailwind-watch"
  }
}
```

This package will do one of two things, depending on the value of `process.env.NODE_ENV`:

1. If the value is `production`, it will ***ONLY*** build the output file.
2. If the value is anything else, it will build the output file ***AND*** start the watcher.

Happy Tailwinding!

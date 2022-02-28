#! /usr/bin/env node

require('dotenv').config()
const watch = require('node-watch');
const { exec } = require("child_process");

const { TAILWIND_IN, TAILWIND_OUT, NODE_ENV } = process.env

if (TAILWIND_IN === undefined || TAILWIND_OUT === undefined) {
  return console.error('❌ ERROR: Cannot find necessary environment variables.')
}

function buildTailwind() {
  console.log('🛠  Building Tailwind...')
  const command = `./node_modules/.bin/postcss ${TAILWIND_IN} -o ${TAILWIND_OUT}`
  exec(command, (error, stdout, stderr) => {
    if (error) {
      console.error(error)
      return
    }
    if (stderr) {
      console.error(stderr)
      return
    }
    return console.log('✅ Tailwind built successfully.')
  })
}

// Just build the file if production
if (NODE_ENV === 'production') {
  return buildTailwind()
}

// If not production, start the watcher
const watcher = watch(process.cwd(), {
  recursive: true,
  filter(f, skip) {
    // Excludes
    if (f.includes('node_modules')) return skip
    if (f.includes('.git')) return skip
    if (f.endsWith(TAILWIND_OUT)) return skip

    // Includes
    if (f.endsWith('tailwind.config.js')) return true
    if (f.endsWith('postcss.config.js')) return true
    if (f.endsWith('.css')) return true
    if (f.endsWith('.pcss')) return true
    }
})

watcher.on('ready', () => {
  buildTailwind()
  console.log('📺 Watching for Tailwind rebuild.')
})

watcher.on('change', () => {
  buildTailwind()
})



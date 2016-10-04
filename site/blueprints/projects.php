<?php if(!defined('KIRBY')) exit ?>

title: Projects
files: false
pages:
  template:
    - project
fields:
  title:
    label: Title
    type:  text
  tagline:
    label: Rotating words
    type: tags
    width: 1/2
  featured:
    label: Featured project
    type: select
    options: children
    value: '{{uri}}'
    width: 1/2
  quotes:
    label: Quotes
    type: structure
    style: table
    fields:
      text:
        label: Quote
        type: text
      author:
        label: Author
        type: text
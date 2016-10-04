<?php if(!defined('KIRBY')) exit ?>

title: Team
files: true
pages: false
deletable: false
fields:
  title:
    label: Title
    type:  text
  text:
    label: Text
    type:  textarea
  founders:
    label: Founders
    type: structure
    style: table
    fields:
      image:
        label: Image
        type: image
        required: true
      name:
        label: Name
        type: text
      position:
        label: Title
        type: text
      subtitle:
        label: Subtitle
        type: text
  numbers:
    label: Counters
    type: structure
    style: table
    fields:
      image:
        label: Icon
        type: image
      name:
        label: Name
        type: text
      number:
        label: Number
        type: number
  team:
    label: Team
    type: structure
    style: table
    fields:
      image:
        label: Image
        type: image
        required: true
      name:
        label: Name
        type: text
      position:
        label: Title
        type: text

# Phava-Specification

You are looking at Phava, bunq's custom-built PHP framework to serve you the best banking experience in the world.
The framework is designed to be easy to work with, yet, powerful enough to build an API that enables the bunq app (and [external developers](https://github.com/bunq)) to do its magic. 🌈

*This is a beta (0.9) version of the Phava specification.*

## About Phava 

Phava is a PHP style framework initially developed as a coding practise for building robust, scalable architectures at [bunq](https://bunq.com). It combines the best of PHP and Java: it's easy to use and read, and it's object-oriented. It's the best of both worlds.

Phava makes for less error-prone code that is easy to maintain. It has objects for everything:

// Andre shared such an example. Is there a code way to say it?
e.g. out 1 into a variable `Number is 1`. What we do is `1 is number object`.

**What Phava has from PHP:**

* the base // how can I say this more correctly/precisely? :)
* setup;
* no compiling;
* works with every deployment system that supports PHP;
* readability.

**What Phava has from Java:**

* focus on objects;
* enforced structure;
* strict typing.

**When should you use Phava?**

Phava makes it possible to create robust, durable architectures that are easy to scale. It's perfect if you want to build an  application that:

* will entail continous development;
* will be worked on by many developers;
* you will not throw away in a couple of years.

Phava will slow you down in the very beginning, but you’ll have a robust system in just two weeks.

## ð  Phava coding conventions / commandments
The good coding practice of Phava is ensured by conforming to the following conventions applied to PHP as the base.

1. ð **Make sure your code is readable**

  This may sound silly, but it is very important. Method names, variable names, etc.: it should be in-your-face obvious what they do/what they are here for. No abbreviations, and explicitness over shorter names.

2. âï¸ **Stick to the naming conventions**

  All classes are named Big-to-Small.
  Let's illustrate this by means of an example;

  ```php
  class MonetaryAccount {};
  class MonetaryAccountBank {};
  class MonetaryAccountSavings {};
  ```

  The more specific parts are in the last part of a classes name. Other examples would be `TabItem` and `TabResultInquiry`, you see how they get more specific towards the end of the name?

3. ð¥ **Test all branches, throw Exceptions when things are exceptional**
  <!-- Very bad example, I need a better one -->
  Make sure all your branches of conditionals are checked upon.
  Take the following example.

  ```php
  if ($user->getBalance()->isGreaterThan(10)) {
    return 'You can buy something!';
  } else if ($user->getBalance()->isSmallerThan(10)) {
    return 'You should save more!';
  }
  ```

  The case where the users balance is exactly 10 is not covered now.
  This you do not want.
  Cover _all_ cases.
  Even if you do not want to do something intentionally.
  Then write it as:

  ```php
  if ($user->getBalance()->isGreaterThan(10)) {
    return 'You can buy something!';
  } else if ($user->getBalance()->isSmallerThan(10)) {
    return 'You should save more!';
  } else {
    // We do not want to show a message when the balance is 10.
  }
  ```

  That way it's clear for others _why_ you do nothing now, and that it is actually intentional.

4. ð **No public variables in objects**

  Use getters and setters such that values can not be changed unintentionally.
5. ð¯ **Keep your methods small**

  Make sure your methods are small, to the point.
  Do you have more than four arguments?
  Then your method is most likely too complex.
  Split it up, or pass an Object instead.

6. ð **No references**

  Just don't do it. <!-- Needs explanation -->
  e.g.

  ```php
  function yoMamma(Model &$model) {
    // Something here.
  }
  ```

7. â¨ **Don't use (PHP) magic**

  Code should always work as the user expects it.
  Nothing more, nothing less.
  This might be the most important rule of all actually.

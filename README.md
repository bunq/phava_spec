# Phava-Specification

You are looking at Phava, bunq's custom-built PHP framework to serve you the best banking experience in the world.
The framework is designed to be easy to work with, yet, powerful enough to build an API that enables the bunq app (and [external developers](https://github.com/bunq)) to do its magic. 🌈

*This is a beta (0.9) version of the Phava specification.*

## About Phava 

Phava is a PHP style framework initially developed as a coding practise for building robust, scalable architectures at [bunq](https://bunq.com). It combines the best of PHP and Java: it's easy to use and read, and it's object-oriented. It's the best of both worlds.

Phava makes for less error-prone code that is easy to maintain. It has objects for everything:

<!-- Andre shared such an example. Is there a code way to say it?
e.g. out 1 into a variable `Number is 1`. What we do is `1 is number object`. -->

**What Phava has from PHP:**

* the base <!-- how can I say this more correctly/precisely? :) -->
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

Phava will slow you down in the very beginning, but you’ll have a robust system in just two weeks. 👯

## Phava coding commandments <!-- does this sound better than conventions? -->
The good coding practice of Phava is ensured by conforming to the following conventions applied to PHP as the base.

1. **Make sure your code is readable** :x:🔮

The names of methods, variable, and <!-- please add at least one more example --> must clearly speak of their purpose. It must be in-your-face obvious what they do and what they are there for. Do not use any abbreviations. Choose explicitness over shorter names.

<!-- can you please add an example? :)? -->

2. **Stick to the naming conventions** 

  All classes must be named Big-to-Small. Larger, encompasing classes come first. Smaller, distinct classes follow.

e.g.
  ```php
  class MonetaryAccount {};
  class MonetaryAccountBank {};
  class MonetaryAccountSavings {};
  ```

The more specific parts must be placed in the last part of the class name. 

e.g.`TabItem` and `TabResultInquiry`: classes get more specific towards the end of the name.

3. **Test all branches and throw Exceptions when things are exceptional**
  <!-- Very bad example, I need a better one -->
  You must check all your conditional branches.
 
 e.g.
  ```php
  if ($user->getBalance()->isGreaterThan(10)) {
    return 'You can buy something!';
  } else if ($user->getBalance()->isSmallerThan(10)) {
    return 'You should save more!';
  }
  ```

The case where the user balance is exactly 10 is not covered now. This is not what you want. You must cover _all_ cases, even when you do not want to do something intentionally.

Here is an improved version of the function above:

  ```php
  if ($user->getBalance()->isGreaterThan(10)) {
    return 'You can buy something!';
  } else if ($user->getBalance()->isSmallerThan(10)) {
    return 'You should save more!';
  } else {
    // We do not want to show a message when the balance is 10.
  }
  ```

This way, it's clear for others _why_ you do nothing now, and that it is actually intentional.

4. **Never use public variables in objects**

Use getters and setters such <!-- do yyou mean "so that"? --> that values can not be changed unintentionally.

<!-- can you please add an example? :)? -->

**Never use aliases in any other level than the API**

No calls or messages must use aliases to find object IDs with the exception of the calls of the API.

5. **Keep functions small** <!-- is "small" an official attribute? -->

All methods must be simple and to the point. If a method has more than four arguments, it is too complex. Split it up, or pass an Object instead.

<!-- can you please add an example? :)? -->

6. **Never use references**

  Just don't do it. <!-- Needs explanation -->
  e.g.

  ```php
  function yoMamma(Model &$model) {
    // Something here.
  }
  ```
<!-- Needs explanation -->

7. **Never use (PHP) magic** :x:🧙

Code must always work as the user expects. Nothing more, nothing less. This is the most important rule of all.

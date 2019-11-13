# Phava Specification

You are looking at Phava, bunq's custom-built PHP framework to serve you the best banking experience in the world.
The framework is designed to be easy to work with, yet, powerful enough to build an API that enables the bunq app (and [external developers](https://github.com/bunq)) to do its magic. 🌈

*This is a beta (0.9) version of the Phava specification.*

## About Phava 

Phava is a PHP style framework initially developed as a coding practise for building robust, scalable architectures at [bunq](https://bunq.com). It combines the best of PHP and Java: it's easy to use and read, and it's object-oriented. It's the best of both worlds.

Phava makes for less error-prone code that is easy to maintain. It has objects for everything. Imagine you have a string "Luxembourg", from just this value you can't derive whether it's referring to the city or to the country. Hence, within Phava you would wrap this value in a class, that tells you exactly what the value is supposed to tell you. In this case it could be either a `City` object or a `Country` object with "Luxembourg" as its value. 

**What Phava has from PHP:**

* the foundation;
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

## Phava coding commandments <!-- does this sound better than conventions? S: It sounds a bit harsh imho -->
The good coding practice of Phava is ensured by conforming to the following conventions applied to PHP as the base.

1. **Make sure your code is readable** :x:🔮
<!-- Instead of the enumeration below maybe rephrase as "all code constructs"? -->
The names of methods, variable, and classes must clearly speak of their purpose. It must be in-your-face obvious what they do and what they are there for. Do not use any abbreviations. Choose explicitness over shorter names.

For example, when naming a constant of which the value is used to limit the amount of results you obtain when executing a database query you could use `LIMIT_QUERY`, but it does when you would use `LIMIT_NUMBER_OF_PAYMENTS_SHOWN_AT_ONCE` it is more clear as to the intention of the limit.

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
  <!-- Very bad example, I need a better one. S: I can't think of a proper example at this moment,.. maybe later something comes to mind -->
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

Use getters and setters such <!-- do yyou mean "so that"? S: Grammarly says it's fine, but if you say it should be "so that" then I'm not going to argue about it :P --> that values can not be changed unintentionally.

Imagine that you have a class that describes a bank account, which has a field to denote your account's balance. When the field would be public _any_ class in the system could overwrite this balance (un)intentionally. By using a getter you could guard access to the balance to only the classes that need access to it, and using a setter you would be able to block unauthorised alterations of this number; changing must always pass through the setter function then in which you can perform the necessary checks. 

**Never use aliases in any other level than the API**

No calls or messages must use aliases to find object IDs with the exception of the calls of the API.

5. **Keep functions small** <!-- is "small" an official attribute? -->

All methods must be simple and to the point. If a method has more than four arguments, it is too complex. Split it up, or pass an Object instead.

For instance imagine a function like the following;

```php
function sendCard(Street $street, NumberHouse $numberHouse, ZipCode $zipCode, City $city, Country $country) {
    ...
}
```

This could be shortened by wrapping the related function parameters into a single `Address` object like so;

```php
function sendCard(Address $address) {
    ...
}
```

6. **Never use references**

  Just don't do it. <!-- Needs explanation. S: I personally don't think it's a bad thing perse, as long as you know what you're doing, I do not recall Andre's/Ali's argument against it apart from it being less readable, but that might not be the strongest argument. -->
  e.g.

  ```php
  function yoMamma(Model &$model) {
    // Something here.
  }
  ```
<!-- Needs explanation -->

7. **Never use (PHP) magic** :x:🧙

Code must always work as the user expects. Nothing more, nothing less. This is the most important rule of all.

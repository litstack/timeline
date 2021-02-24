# Litstack Timeline

A package to simply add timelines to Crud's in litsatck.

## Setup

1. Install the package via composer:

```shell
composer require litstack/timeline
```

2. Publish and run the migrations:

```shell
php artisan vendor:publish --tag=timeline:migrations
php artisan migrate
```

## Usage

Add the `Timelineable` contract and the `HasTimeline` trait to your Model:

```php
use Litstack\Timeline\Contracts\Timelineable;
use Litstack\Timeline\HasTimeline;

class Post extends Model implements Timelineable
{
    use HasTimeline;
}
```

Push a timeline item to your Model:

```php
// Add message to timeline.
$post->addToTimeline('Hello World!')->save();
// With some available options.
$post->addToTimeline('Hello World!')->title('Foo')->showTime()->variant('success')->save();
// Variant danger is available as well.
$post->addToTimeline('Hello World!')->variant('danger')->save();
```

## Show Timeline

In your `CrudConfig`:

```php
public function show($page)
{
    $page->timeline();
}
```

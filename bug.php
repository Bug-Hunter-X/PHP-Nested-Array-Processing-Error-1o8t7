```php
<?php
function processData(array $data): array {
  $result = [];
  foreach ($data as $item) {
    if (is_array($item)) {
      $result = array_merge($result, processData($item));
    } elseif (is_string($item) && strpos($item, 'error') !== false) {
      // Handle error strings here
      //This line is the bug, it doesn't append the error to the result array.
       // $result[] = $item;  
    } else {
      $result[] = $item;
    }
  }
  return $result;
}

$data = [
  'value1',
  ['value2', 'error occurred'],
  'value3',
];

$processedData = processData($data);
print_r($processedData);
?>
```
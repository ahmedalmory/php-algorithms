<?php

// Description:
// The minimum number of swaps required to sort an array algorithm in PHP is used to determine the minimum number of swaps needed to sort an array of integers. It works by creating an associative array to store the indexes of the input array, creating a sorted copy of the input array, and iterating through the input array to compare each element to its corresponding element in the sorted copy. If the elements are not equal, the algorithm performs a swap and updates the associative array with the new indexes of the swapped elements. The process is repeated until the entire array is sorted. Finally, the algorithm calculates the minimum number of swaps required by counting the number of swaps performed and returns the result.


// Algorithm in plain text:
// 1. Create an associative array to store the indexes of the input array.
// 2. Create a copy of the input array and sort it to get the correct order.
// 3. Iterate through the input array and compare each element to its corresponding element in the sorted copy.
// 4. If the elements are not equal, perform a swap and update the associative array with the new indexes of the swapped elements.
// 5. Repeat step 3 and 4 until the entire array is sorted.
// 6. Calculate the minimum number of swaps required by counting the number of swaps performed.
// 7. Return the minimum number of swaps required..


// time complexity: O(n log n)
// space complexity: O(n)


// Algorithm:
function swap(&$array, $index1, $index2)
{
    [$array[$index1], $array[$index2]] = [$array[$index2], $array[$index1]];
}

function min_swaps_required_to_sort_array($array)
{
    // Get the size of the input array
    $size = count($array);

    // Initialize the number of swaps required to 0
    $swaps_required = 0;

    // Create a sorted copy of the input array
    $sorted_array = $array;
    sort($sorted_array);

    // Create an associative array to store the indexes of the input array
    $indexes = [];
    for ($i = 0; $i < $size; $i++) {
        $indexes[$array[$i]] = $i;
    }

    // Iterate through the input array and compare each element to its corresponding element in the sorted copy
    for ($i = 0; $i < $size; $i++) {
        // Check if the element at position $i is at the correct position
        if ($array[$i] != $sorted_array[$i]) {

            // Increment the number of swaps required
            $swaps_required++;

            $current_index = $i;
            $current_value = $array[$current_index];

            $distance_index = $indexes[$sorted_array[$current_index]];
            $distance_value = $array[$distance_index];

            // Swap the element with its correct position
            swap($array, $current_index, $distance_index);

            // Update the indexes of the swapped elements in the associative array
            $indexes[$current_value] = $distance_index;
            $indexes[$distance_value] = $current_index;
        }
    }

    // Return the minimum number of swaps required to sort the array
    return $swaps_required;
}

// Example usage
$my_array = [1,9,2,3];
echo min_swaps_required_to_sort_array($my_array); // Output: 2

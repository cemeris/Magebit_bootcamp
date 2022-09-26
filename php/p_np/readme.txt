An array of integers is given.
for example [3*, 5, 6*, -12, -10, -14, 9, 11, 4]

write the function that will determine if there is a set of numbers
inside of a given array where the sum of those numbers equals to another
number in an array.

True
[3, 5, 6, -12, -10, -14]
[3, 5, -12, -10, -14]
3 + 5 + (-12) + (-10) = -14

True
[3, 5, 6, -12, -10, -13]
[3, 6, -12, -10, -14]
3 + 6 + (-12) + (-10) = -13

False
[3, 5, 6, -12, -10, -100]
[]


Input: [3, 5, 6, -12, -10, -14, 0, 3]
Output: true


IDEAS:
Iterate through array values and make different sums compare them
to all the rest numbers



PLAN:
 - defining a single array;
 - define function
 - call a function
 - make an Output
 - write the function for finding 2 number sums with a matching number
 - output multiple tests at a time
 - write the function for finding N number sums with a matching number




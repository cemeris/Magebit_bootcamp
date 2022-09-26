export { generationNextNumber as nextNumber, generationPrevious as previousNumber };

function generationNextNumber(n1) {
    return (3 * n1 + 1) / 2;
}

function generationPrevious(n1) {
    return (n1 * 2 - 1) / 3;
}
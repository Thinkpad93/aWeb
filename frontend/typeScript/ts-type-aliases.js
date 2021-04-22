function getName(n) {
    if (typeof n === "string") {
        return;
    }
    else {
        return n();
    }
}

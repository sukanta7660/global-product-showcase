function slugify (text) {
    const mainText = text.toLowerCase().trim();
    return mainText.replace(/[^a-z\d]+/g, "-");
}

/**
 * Reusable AJAX form submission helper for multipart/form-data (including files).
 *
 * @param {string} formSelector - CSS selector for your form (e.g. '#add-post-form').
 * @param {string} responseSelector - CSS selector for the message container (e.g. '#response').
 * @param {string} endpoint - The URL where the form data should be submitted (e.g., '<?= ROOT ?>blog/post').
 * @param {number} [timeout=8000] - Time in milliseconds before the response message fades out.
 */

function submitForm(formSelector, responseSelector, endpoint, timeout = 8000, redirectUrl = null) {
    const form = document.querySelector(formSelector);
    const responseBox = document.querySelector(responseSelector);

    if (!form) return;

    if (form.getAttribute('data-submit-listener') === 'true') return;
    form.setAttribute('data-submit-listener', 'true');

    form.addEventListener("submit", async (event) => {
        event.preventDefault();

        responseBox.style.display = "block";
        responseBox.style.color = "blue";
        responseBox.innerHTML = "Submitting... ⏳";

        const formData = new FormData(form);

        try {
            const response = await fetch(endpoint, { method: "POST", body: formData });
            const data = await response.json();

            if (data.success) {
                responseBox.style.color = "green";
                responseBox.innerHTML = data.message || "Form submitted successfully ✅";
                form.reset();

                // ✅ Redirect if provided
                if (data.redirect) {
                    setTimeout(() => {
                        window.location.href = data.redirect;
                    }, 1500);
                }
            } else {
                responseBox.style.color = "red";
                responseBox.innerHTML = data.message || "Submission failed ❌";
            }

        } catch (error) {
            responseBox.style.color = "red";
            responseBox.innerHTML = "Submission failed: " + (error.message || "Network error.");
            console.error("AJAX Error:", error);
        }

        setTimeout(() => {
            responseBox.style.display = "none";
            responseBox.innerHTML = "";
        }, timeout);
    });
}

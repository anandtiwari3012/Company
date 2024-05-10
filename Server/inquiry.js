// Fetch inquiries from the server
fetch('inquiry.php')
    .then(response => response.json())
    .then(data => {
        const inquiriesDiv = document.getElementById('inquiries');
        data.forEach(inquiry => {
            const inquiryDiv = document.createElement('div');
            inquiryDiv.classList.add('inquiry');
            inquiryDiv.innerHTML = `
                <p><strong>Name:</strong> ${inquiry.name}</p>
                <p><strong>Email:</strong> ${inquiry.email}</p>
                <p><strong>Message:</strong> ${inquiry.message}</p>
                <hr>
            `;
            inquiriesDiv.appendChild(inquiryDiv);
        });
    })
    .catch(error => console.error('Error fetching inquiries:', error));

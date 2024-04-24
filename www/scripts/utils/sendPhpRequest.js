export default function sendPhpRequest(path, method, data, handleSuccess = (response) => { }, handleFailure = (response) => { }, handleError = (error) => { }) {
    fetch(path, {
        method: method,
        headers: {
            "Content-Type": 'application/x-www-form-urlencoded',
        },
        body: data
    })
        .then(response => {
            if (response.ok) {
                handleSuccess(response);
            } else {
                handleFailure(response);
            }
        })
        .catch(error => {
            handleError(error);
        });
}
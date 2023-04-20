class FetchXHR {
  static request(method, url, data, headers = {}) {
    return new Promise((resolve, reject) => {
      const xhr = new XMLHttpRequest();

      xhr.open(method, url, true);

      Object.keys(headers).forEach(key => {
        xhr.setRequestHeader(key, headers[key]);
      });

      xhr.onload = () => {
        const responseData = xhr.response ? JSON.parse(xhr.response) : null;
        resolve({
          status: xhr.status,
          data: responseData,
        });
      };

      xhr.onerror = () => {
        reject(new Error('An error occurred during the XMLHttpRequest'));
      };

      xhr.send(data);
    });
  }

  static get(url, headers = {}) {
    return this.request('GET', url, null, headers);
  }

  static post(url, data, headers = {}) {
    return this.request('POST', url, JSON.stringify(data), headers);
  }
}

export default FetchXHR;

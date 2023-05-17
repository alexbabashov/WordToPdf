
export const moduleMain = {
    state() {
        return {

        };
    },
    getters: {

    },
    mutations: {

    },
    actions: {
        async convertDocPdf({ state, commit, getters, dispatch}, {file, variableWord})
        {
            const formData = new FormData();
            formData.append('file', file);
            formData.append('variableWord', variableWord);
            try
            {
                const response = await axios.post('convertDocPdf', formData,{responseType: 'blob',});

                const href = window.URL.createObjectURL(response.data);
                const anchorElement = document.createElement('a');
                anchorElement.href = href;
                anchorElement.download = file.name.split('.')[0] + '.pdf'

                document.body.appendChild(anchorElement);
                anchorElement.click();
                document.body.removeChild(anchorElement);
                window.URL.revokeObjectURL(href);
            }
            catch(e)
            {
                console.log(e);
            }

        },
    }
}

import axios from 'axios';

export const getInstagram = async username => {
    try {
        let url = null;
        let transientPrefix = null;
        const input = username.toLowerCase().trim();

        switch ( input.substring(0, 1) ) {
            case '#':
                url = 'https://instagram.com/explore/tags/' + input.replace('#', '');
                transientPrefix = 'h';
                break;

            default:
                url = 'https://instagram.com/' + input.replace('@', '');
                transientPrefix = 'u';
                break;
        }

        if (url === null) return {
            status: 0,
            error: 'api url not exits',
            payload: []
        };

        const response = await axios.post(url, {});

        data =[{
            image: '',
            link: ''
        }];

        return {
            status: 1,
            payload: data
        };
    } catch(err) {
        return {
            status: 0,
            error: 'err',
            payload: []
        };
    }
}

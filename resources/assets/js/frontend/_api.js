export const getInstagram = async (username, limit = 6) => {
    try {
        if (username === undefined || username === null || typeof username !== 'string' || username.length < 0) {
            return {
                status: 0,
                error: 'params type error.'
            }
        }

        let endpoint = null;
        const input = username.toLowerCase().trim();

        switch ( input.substring(0, 1) ) {
            case '#':
                endpoint = 'explore/tags/' + input.replace('#', '');
                break;

            default:
                endpoint = input.replace('@', '');
                break;
        }

        if (endpoint === null) return {
            status: 0,
            error: 'api url not exits'
        };

        const response = await window.axios({
            method: 'get',
            url: 'https://cors-anywhere.herokuapp.com/https://www.instagram.com/' + endpoint,
            headers: {
                'Access-Control-Allow-Origin': '*',
                'Access-Control-Allow-Headers': '*',
                'Access-Control-Allow-Methods': 'PUT, GET, POST, DELETE, OPTIONS'
            },
            withCredentials: false
        });

        let payload = [];
        let images = [];
        const temp1 = response.data.split('window._sharedData = ');
        const temp2 = temp1.length ? temp1[1].split(';</script>') : [null];
        const data = JSON.parse(temp2[0]);

        if (data && data['entry_data']['ProfilePage'] && data['entry_data']['ProfilePage'].length) {
            images = data['entry_data']['ProfilePage'][0]['graphql']['user']['edge_owner_to_timeline_media']['edges'];
        } else if (data && data['entry_data']['TagPage'] && data['entry_data']['TagPage'].length) {
            images = data['entry_data']['TagPage'][0]['graphql']['hashtag']['edge_hashtag_to_media']['edges'];
        }

        for (let i = 0; i < images.length; i++) {
            let type = 'image';
            let caption = 'Instagram Image';
            let link = null;

            if (images[i]['node']['is_video']) {
                type = 'video';
            }

            if (images[i]['node']['edge_media_to_caption']['edges'].length && images[i]['node']['edge_media_to_caption']['edges'][0]['node']['text']) {
                caption = images[i]['node']['edge_media_to_caption']['edges'][0]['node']['text'];
            }

            if (images[i]['node']['shortcode']) {
                link = '//instagram.com/p/' + images[i]['node']['shortcode'];
                link.replace(/\/$/, '');
            }

            payload.push({
                type,
                caption,
                link,
                time: images[i]['node']['taken_at_timestamp'],
                comments: images[i]['node']['edge_media_to_comment']['count'],
                likes: images[i]['node']['edge_liked_by']['count'],
                thumbnail: images[i]['node']['thumbnail_resources'][0]['src'].replace('/^https?\:/i', ''),
                small: images[i]['node']['thumbnail_resources'][2]['src'].replace('/^https?\:/i', ''),
                large: images[i]['node']['thumbnail_resources'][4]['src'].replace('/^https?\:/i', ''),
                original: images[i]['node']['display_url'].replace('/^https?\:/i', '')
            });

            if (i > limit - 2) break;
         }

        return {
            status: 1,
            payload
        };
    } catch(err) {
        return {
            status: 0,
            error: 'err'
        };
    }
}

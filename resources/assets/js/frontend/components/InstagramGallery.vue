<template>
    <div class="instagram-gallery">
        <div class="gallery-inner column-3">
            <a v-for="item in items" :href="item.link" class="single-gallery-items" target="_blank">
                <img :src="item.image" alt="">
            </a>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                items: [
                    {
                        image: '/images/static/temp/flickr/01.jpg',
                        link: '#'
                    },
                    {
                        image: '/images/static/temp/flickr/02.jpg',
                        link: '#'
                    },
                    {
                        image: '/images/static/temp/flickr/03.jpg',
                        link: '#'
                    },
                    {
                        image: '/images/static/temp/flickr/04.jpg',
                        link: '#'
                    },
                    {
                        image: '/images/static/temp/flickr/05.jpg',
                        link: '#'
                    },
                    {
                        image: '/images/static/temp/flickr/06.jpg',
                        link: '#'
                    }
                ]
            };
        },
        mounted() {
            this.fetchData();
        },
        methods: {
            async fetchData() {
                // const response = await window.axios.get('https://instagram.com/chanelcartoon01');
                const response = await window.axios({
                    method:'post',
                    url:'https://instagram.com/chanelcartoon01',
                    headers: {
                        // crossdomain: true
                        'Access-Control-Allow-Origin': '*'
                        // 'Content-Type': 'application/json',
                    }
                });

                console.log(response);
            }
        }
    }
</script>

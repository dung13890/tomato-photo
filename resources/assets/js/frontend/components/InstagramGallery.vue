<template>
    <div class="instagram-gallery">
        <div v-if="profile" class="instagram-profile text-center">
            <a :href="'https://www.instagram.com/' + profile.username" target="_blank"><img :src="profile.profilePicUrl" :alt="profile.fullName"></a>
            <h4 class="instagram-profile__name">@<a :href="'https://www.instagram.com/' + profile.username" target="_blank">{{ profile.username }}</a></h4>
        </div>
        <div class="gallery-inner column-1 overflow-hidden">
            <a v-for="item in items" :href="item.link || '#'" class="single-gallery-items" target="_blank">
                <img :src="item.thumbnail" :alt="item.caption">
            </a>
        </div>
    </div>
</template>

<script>
    import { getInstagram } from '../_api';

    export default {
        props: {
          username: {
            type: String,
            default: ''
          },
          limit: {
            type: Number,
            default: () => 0
          }
        },
        data() {
            return {
                items: [],
                profile: null
            };
        },
        mounted() {
            this.fetchData();
        },
        methods: {
            async fetchData() {
                const res = await getInstagram(this.username, this.limit);

                console.log('Res: ', res);

                if (res.status) {
                    this.items = res.payload;
                    this.profile = res.payloadExt.profile;
                }
            }
        }
    }
</script>

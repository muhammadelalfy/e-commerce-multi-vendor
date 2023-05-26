import { ref, inject } from 'vue'
import { useRouter } from 'vue-router'

export default function usePosts() {
    const navitems = ref({})
    const post = ref({
        title: '',
        content: '',
        category_id: '',
        thumbnail: ''
    })

    const getPosts = async () => {
        axios.get('/api/navitems')
            .then(response => {
                navitems.value = response.data;
            })
    }
}

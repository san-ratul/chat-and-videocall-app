import axios         from 'axios'
import isEmpty       from "./is_empty";
import UseAuthStore  from "./stores/auth";

const instance = axios.create({
   baseURL: import.meta.env.VITE_API_URL
});

instance.interceptors.request.use(
    (config) => {
        const auth = UseAuthStore();
       if(!isEmpty(auth.getToken)){
          config.headers['Authorization'] = `Bearer ${auth.getToken}`;
       }
       return config
    }
)

instance.interceptors.response.use(
    (response) => {
        return response
    }, (error) => {
        const auth = UseAuthStore();
        if( error.response.status === 401 ) {
            auth.logoutAuthenticatedUser();
            location.reload()
        }
        return error;
    }
)


export default instance;

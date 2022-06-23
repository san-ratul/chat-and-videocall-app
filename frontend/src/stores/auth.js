import { defineStore } from "pinia";
import isEmpty         from "../is_empty";
import UseChatStore    from "./chat";

const UseAuthStore = defineStore({
    id: 'auth',
    state: () => ({
        user: !isEmpty(localStorage.getItem('auth')) ? JSON.parse(localStorage.getItem('auth')).user : {},
        token: !isEmpty(localStorage.getItem('auth')) ? JSON.parse(localStorage.getItem('auth')).token : false,
    }),
    getters: {
        isAuthenticated : (state) => !isEmpty(state.user),
        getToken : (state) => state.token,
        getImage : (state) => state.user.image
    },
    actions: {
        setAuthenticatedUser(payload){
            this.user = payload.user;
            this.token = payload.token;
            localStorage.setItem('auth', JSON.stringify(payload));
        },
        logoutAuthenticatedUser(){
            const chatStore = UseChatStore();
            chatStore.$reset();
            localStorage.removeItem('auth');
            this.user = {};
            this.token = false;
        },
    }
})

export default UseAuthStore;
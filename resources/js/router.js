import VueRouter from 'vue-router';

//import App from './components/App';
import Home from './components/Home.vue';
import Login from './components/Login.vue';
import Menu from './components/Menu.vue';
import Profil from './components/Profil.vue';
import Register from './components/Register.vue';
import Admin from './components/admin/Admin.vue';
import Verify from './components/verify/Verify.vue';
import Resend from './components/verify/Resend.vue';
import VerifyNotic from './components/verify/VerifyNotic.vue';

//import Indax from './components/admin/Index';
//import Register from './components/Register';

import axios from 'axios';


export default new VueRouter({
	routes: [
		{
			path: '/',
			component : Home
		},
		{
			path: '/login',
			component : Login
		},
		{
			path: '/register',
			component : Register
		},
		{
			path: '/menu',
			component : Menu
		},
		{
			path: '/profil',
			component : Profil
		},
		{
			path: '/admin',
			component : Admin
		},
		{
			path: '/email/verify',
			component : Verify
		},
		{
			path: '/email/verify/notic',
			component : VerifyNotic
		},
		{
			path: '/email/resend/',
			component : Resend
		}
	],
	mode : 'history'
})
import { useUserStore } from '@/stores/user.store'
import router from '@/router'
import { PAGES } from '@/model'
import type { UserInfoType } from '@/entities/user/user.model'
import {UserService} from "@/services";


export function token() {
    let token = useUserStore().token

    if (!token) useUserStore().logout()
    else return token
}

export class authenticate {
    async putUserInfoInLS(data: UserInfoType, access_token: string, is_redirect = true) {
        const obj: any = {
            userinfo: data,
            token: access_token,
        }

        if (obj.userinfo) localStorage.setItem('USER_DATA', JSON.stringify(obj))
        useUserStore().isAuth = true
        useUserStore().setUserInfoAndToken(obj.userinfo, obj.token)

        if (is_redirect) await router.push(PAGES.HOME)
    }

    async getUserInfoFromLS() {
        if (!localStorage.getItem('token')) {
            await router.push(PAGES.LOGIN)
        } else {
            useUserStore().token = localStorage.getItem('token') || ''
            const result:any  = await UserService().checkToken()
            if (result?.id){
                useUserStore().isAuth = true
            }
        }
    }

    async logout() {
        useUserStore().logout()
        localStorage.removeItem('USER_DATA')
        await router.push(PAGES.LOGIN)
    }
}


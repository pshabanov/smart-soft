import ky from 'ky'
import { useUserStore } from '@/stores'
import type { NewsRequestType } from '@/entities/news/news.model'

const BASE_URL = import.meta.env.VITE_BASE_URL

export const CommonService = () => {

    const uploadImage = async (data: File): Promise<string> => await ky('upload-image', {
        prefixUrl: `${BASE_URL}`,
        method: 'post',
        body: data,
        timeout: 60000,
    }).json()

    return {
        uploadImage
    }
}
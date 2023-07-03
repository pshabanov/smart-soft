import ky from 'ky'
import { useUserStore } from '@/stores'
import type { ReviewRequestType} from '@/entities/news/news.model'

const BASE_URL = import.meta.env.VITE_BASE_URL

export const ReviewsService = () => {

    const reviews = async (): Promise<{ data: ReviewRequestType[] }> => await ky('reviews', {
        prefixUrl: `${ BASE_URL }`,
        method: 'get',
        timeout: 60000,
    }).json()

    const reviewsById = async (id: number): Promise<{ data: ReviewRequestType }> => await ky(`reviews/${ id }`, {
        prefixUrl: `${ BASE_URL }`,
        method: 'get',
        headers: {
            'Accept': 'application/json',
            'Authorization': `Bearer ${ useUserStore().token }`,
        },
        timeout: 60000,
    }).json()

    const createReviews = async (data: ReviewRequestType, files: Blob[]): Promise<ReviewRequestType> => {
        const formData = new FormData()
        formData.append('text', data.text)
        formData.append('company', data.company)
        formData.append('active', String(data.active))
        if (files.length){
            formData.append('files', files[0])
        }
        return await ky(`reviews`, {
            prefixUrl: `${ BASE_URL }`,
            method: 'post',
            headers: {
                'Authorization': `Bearer ${ useUserStore().token }`,
            },
            body: formData,
            timeout: 60000,
        }).json()
    }

    const updateReviews = async (data: ReviewRequestType): Promise<{data: ReviewRequestType}> => {

        return await ky(`reviews/${ data.id }`, {
            prefixUrl: `${ BASE_URL }`,
            method: 'put',
            headers: {
                'Authorization': `Bearer ${ useUserStore().token }`,
            },
            json: data,
            timeout: 60000,
        }).json()
    }

    const reviewsDelete = async (id: number): Promise<number | null> => await ky(`reviews/${ id }`, {
        prefixUrl: `${ BASE_URL }`,
        method: 'delete',
        timeout: 60000,
    }).json()

    return {
        reviews,
        reviewsById,
        reviewsDelete,
        createReviews,
        updateReviews,
    }
}

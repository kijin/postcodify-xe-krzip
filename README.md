
Postcodify XE 모듈
==================

[Postcodify](http://postcodify.poesis.kr/) 새주소 우편번호 검색 프로그램을
XE에서 사용할 수 있도록 만든 모듈입니다.
XE의 기존 우편번호 검색 [서비스 종료](http://www.xpressengine.com/devlog/22923430)에 영향을 받지 않으며,
XE 1.7.12부터 기본으로 제공되는 다음 API 및 우체국 API에 대안으로 사용할 수 있습니다.

지역을 별도로 선택하지 않아도 도로명, 지번, 건물명 등으로 유연하게 검색이 가능하고,
2015년 8월부터 시행된 새 우편번호 체계도 완벽하게 지원합니다.


설치 방법
---------

1. 기존에 사용하던 `krzip` 모듈을 삭제하고, 관리 모듈에서 캐시를 재생성합니다.
2. 이 모듈의 `krzip` 폴더를 XE의 모듈 폴더로 복사합니다.
3. 회원가입 또는 회원정보 변경 페이지에서 평소처럼 우편번호 검색을 하시면 됩니다.
4. 모듈 설정 화면에서 검색서버의 주소, 지도 링크, 우편번호 표시 형태 (6자리 기존 방식 또는 5자리 새 방식),
   지번주소 표시 여부 등을 선택할 수 있습니다.


데이터 포맷
-----------

이 모듈을 사용하여 주소를 입력받으면 `member` 테이블의 `extra_vars` 필드 중 사용자가 지정한 속성에
아래와 같은 포맷으로 데이터가 저장됩니다.

    Array
    (
        [0] => 우편번호
        [1] => 도로명주소
        [2] => 상세주소
        [3] => (참고정보)
        [4] => 지번주소
    )

모듈 설정에서 일부 정보를 표시하지 않도록 지정한 경우에는 해당 정보가 누락될 수도 있습니다.
(지번주소는 표시하지 않는 것이 기본 설정이며, 참고정보까지 숨겨도 무방합니다.)

참고로 이 모듈의 구버전(~1.2)에서는 아래와 같은 포맷을 사용하였고,

    Array
    (
        [0] => 도로명주소
        [1] => 상세주소
        [2] => (참고정보)
        [3] => 우편번호
    )

XE에서 배포하는 `krzip` 공식 모듈은 버전에 따라 아래와 같은 포맷을 사용합니다.

2014년 11월 이전:

    Array
    (
        [0] => 도로명주소 (참고정보) (우편번호)
        [1] => 상세주소
    )

2014년 12월 이후:

    Array
    (
        [0] => 도로명주소
        [1] => 상세주소
        [2] => (참고정보) (우편번호)
    )

2015년 3월 이후 (다음 API 및 우체국 API 이용):

    Array
    (
        [0] => 우편번호
        [1] => 도로명주소
        [2] => (지번주소)
        [3] => 상세주소
        [4] => (참고정보)
    )

구버전 또는 기존 모듈의 포맷으로 저장된 데이터가 많이 쌓여 있는 경우
다른 프로그램과의 연동에 지장이 있을 수 있으니, 사용시 변환하거나 일괄 변환을 해주셔야 합니다.
기존의 어떤 포맷으로 저장된 주소라도 쉽게 Postcodify 모듈의 포맷으로 변환할 수 있도록
`convertDataFormat()` 메소드를 제공하고 있습니다.

    // 회원의 주소 정보가 $address에 저장되어 있다고 가정
    $oKrzipModel = getModel('krzip');
    $address = $oKrzipModel->convertDataFormat($address);

반드시 기존 포맷의 주소가 필요하신 경우에는 모듈 설정 페이지에서
기존 krzip 모듈과 같은 포맷을 사용하도록 설정할 수 있습니다.
(위에서 나열한 3가지 포맷 모두 지원합니다.)


라이센스
--------

이 모듈은 XE와 같이 LGPLv2.1 라이센스를 따릅니다.

이 모듈에서 호출하여 사용하는 Postcodify 검색 스크립트는 LGPLv3 라이센스를 따릅니다.
